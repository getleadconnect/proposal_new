<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Facades\FileUpload;

use App\Models\User;
use App\Models\Designation;
use App\Models\ProposalValueHeading;
use App\Models\ProposalBanner;
use App\Models\ProposalHeading;
use App\Models\ProposalHeadingItem;
use App\Models\ProposalSpecialService;
use App\Models\ProposalOtherService;
use App\Models\ProposalTimeline;
use App\Models\ProposalBankDetail;
use App\Models\ProposalDocument;
use App\Models\ProposalNote;
use App\Models\ProposalCondition;

use App\Models\ProposalTempValue;
use App\Models\ProposalValue;
use App\Models\Proposal;
use App\Models\Customer;

use Validator;
use DataTables;
use Session;
use Auth;
use Log;
use DB;


class NewProposalController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	 $phases=ProposalValueHeading::orderby('id','ASC')->get();
	 $items=ProposalHeadingItem::orderby('id','ASC')->get();
	 $customers=Customer::orderby('id','ASC')->get();
	 return view('users.proposal.proposal_create',compact('phases','items','customers'));
  }	
   
public function store(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'item_section'=>'required',
			'item_name'=>'required',
			'item_option'=>'required',
			'item_amount'=>'required',
		]);
		
        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
            try
			{
				$data=[
					'vendor_id'=>$vendor_id,
					'created_by'=>Auth::user()->id,
					'proposal_value_heading'=>$request->item_section,
					'proposal_heading_item'=>$request->item_name,
					'include_option'=>$request->item_option,
					'currency'=>Auth::user()->currency,
					'amount'=>$request->item_amount,
				];
	
				$result=ProposalTempValue::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Proposal value added.','status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>'Something wrong, Try again.','status'=>false]);
        		}

           }
            catch(\Exception $e)
            {
			   return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }
    	
	
 public function viewProposalTempValues(Request $request)
    {
      $id=User::getVendorId();

      $desig = ProposalTempValue::where('vendor_id',$id)->orderby('id','ASC')
			->when($request->search,function($query,$search){
                return $query ->where('proposal_temp_values.proposal_value_heading', 'LIKE', '%' . $search . '%');
            })->get();
	
        return Datatables::of($desig)
		->addIndexColumn()
		->addColumn('val_sec', function ($row) {
			return strtoupper($row->proposal_value_heading);
        })
		->addColumn('item', function ($row) {
			return strtoupper($row->proposal_heading_item);
        })
		->addColumn('inc_option', function ($row) {
			return strtoupper($row->include_option);
        })
		->addColumn('amount', function ($row) {
			return number_format($row->amount,2,'.','');
        })
		
        ->addColumn('action', function ($row)
        {
			$action='<a href="javascript:;" class="del-item" id="'.$row->id.'" ><i class="lni lni-trash" style="color:red;"></i></a>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function destroy($id)
{
	try
	{
		$res=ProposalValue::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Proposal value successfully removed.','status'=>true]);
		}
		else
		{
			return response()->json(['msg'=>'Something wrong, Try again.','status'=>false]);
		}
	}
	catch(\Exception $e)
	{
		return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
	}
}


//===========================================================
     
  
  public function saveNewProposal(Request $request)
    {
		
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'proposal_name'=>'required',
			'customer_name'=>'required',
			'phone_number'=>'required',
			'email'=>'required|email',
			'activity'=>'required',
			'activity_code'=>'required',
			'juridiction'=>'required',
			'no_of_visa'=>'required',
			'shareholders'=>'required',
		]);
		
        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			DB::beginTransaction();
						
            try
			{
				$uni_code=$this->getUniqueNumberCode();
								
				$data=[
					'ref_no'=>"EB".$uni_code,
					'vendor_id'=>$vendor_id,
					'created_by'=>Auth::user()->id,
					'proposal_name'=>$request->proposal_name,
					'customer_name'=>$request->customer_name,
					'country_code'=>$request->country_code,
					'phone_number'=>$request->phone_number,
					'email'=>$request->email,
					'activity'=>$request->activity,
					'activity_code'=>$request->activity_code,
					'juridiction'=>$request->juridiction,
					'no_of_visa'=>$request->no_of_visa,
					'shareholders'=>$request->shareholders,
				];
	
				$result=Proposal::create($data);

				$pro_id=$result->id;
				
				$tempData=ProposalTempValue::where('vendor_id',$vendor_id)->where('created_by',Auth::user()->id)->get();
				
				foreach($tempData as $row)
				{
					$tData=[
					  'proposal_id'=>$pro_id,
					  'proposal_value_heading'=>$row->proposal_value_heading,
					  'proposal_heading_item'=>$row->proposal_heading_item,
					  'include_option'=>$row->include_option,
					  'currency'=>$row->currency,
					  'amount'=>$row->amount,
					];
					$res2=ProposalValue::create($tData);
				}
				
				$res=Customer::where('phone_number',$request->phone_number)->first();
					if(empty($cust))
					{
						$data1=[
							'customer_name'=>$request->customer_name,
							'country_code'=>$request->country_code,
							'phone_number'=>$request->phone_number,
							'email'=>$request->email,
							'activity'=>$request->activity,
							'activity_code'=>$request->activity_code,
							'juridiction'=>$request->juridiction,
							'no_of_visa'=>$request->no_of_visa,
							'shareholders'=>$request->shareholders,
						];
	
						$res1=Customer::create($data1);
					}
				
				DB::commit();
				
				if($result)
				{
					$pres=ProposalTempValue::where('vendor_id',$vendor_id)->where('created_by',Auth::user()->id)->delete();
					Session::flash("success",'Proposal successfully added.');
        		}
        		else
        		{
					DB::rollback();
					Session::flash('fail','Something wrong, Try again');
					return redirect()->back();
        		}
				
				return redirect('users/proposals');

           }
            catch(\Exception $e)
            {
			   DB::rollback();
			   Session::flash('fail',$e->getMessage());
			   return redirect()->back();
            }
        } 
    }
  
  
    //Generated unique short code -----------------------------------

public function getUniqueNumberCode()
{
	$length = 5;
    $code = substr(uniqid(bin2hex(random_bytes(4)), true), -$length);  // Limiting the length to maxLength
    return $code;
}
 
 public function getCustomer($id)
 {
	 $cust=Customer::where('id',$id)->first();
	 if($cust)
		return response()->json(['msg'=>'Customer were found!','data'=>$cust,'status'=>true]);
	return response()->json(['msg'=>'Customer were found!','data'=>[],'status'=>false]);
	 
 }

}
