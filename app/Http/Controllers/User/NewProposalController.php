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
	 Session::put(['total_amount'=>0]);
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
				$item_sec=explode(',',$request->item_section);
				
				$data=[
					'vendor_id'=>$vendor_id,
					'created_by'=>Auth::user()->id,
					'proposal_value_heading_id'=>$item_sec[0],
					'proposal_value_heading'=>$item_sec[1],
					'proposal_heading_item'=>$request->item_name,
					'include_option'=>$request->item_option,
					'currency'=>Auth::user()->currency,
					'amount'=>$request->item_amount,
				];
	
				$result=ProposalTempValue::create($data);

				if($result)
        		{   
					$tot=Session::get('total_amount');
					$tot=$tot+$request->item_amount;
					Session::put(['total_amount'=>$tot]);
					
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
	
	
public function getProposalItemTotalAmount()
{
	$vendor_id=User::getVendorId();
	$user_id=Auth::user()->id;
	$amt=ProposalTempValue::where('vendor_id',$vendor_id)->where('created_by',$user_id)->sum('amount');
	return response()->json(['amount'=>$amt,'status'=>true]);
}

public function getProposalItemTotalAmountForEdit($id)
{
	$vendor_id=User::getVendorId();
	$user_id=Auth::user()->id;
	$amt=ProposalValue::where('proposal_id',$id)->sum('amount');
	return response()->json(['amount'=>$amt,'status'=>true]);
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
		$res=ProposalTempValue::where('id',$id)->delete();
		
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
			Session::flash("success",$validator->messages()->first());
			return redirect()->back();
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
					'mobile'=>$request->country_code.$request->phone_number,
					'email'=>$request->email,
					'activity'=>$request->activity,
					'activity_code'=>$request->activity_code,
					'juridiction'=>$request->juridiction,
					'no_of_visa'=>$request->no_of_visa,
					'shareholders'=>$request->shareholders,
					'total_amount'=>$request->total_amount,
					'discount'=>$request->discount,
				];
	
				$result=Proposal::create($data);

				$pro_id=$result->id;
				
				$tempData=ProposalTempValue::where('vendor_id',$vendor_id)->where('created_by',Auth::user()->id)->get();
				
				foreach($tempData as $row)
				{
					$tData=[
					  'proposal_id'=>$pro_id,
					  'proposal_value_heading_id'=>$row->proposal_value_heading_id,
					  'proposal_value_heading'=>$row->proposal_value_heading,
					  'proposal_heading_item'=>$row->proposal_heading_item,
					  'include_option'=>$row->include_option,
					  'currency'=>$row->currency,
					  'amount'=>$row->amount,
					];
					$res2=ProposalValue::create($tData);
				}
				
				$cust=Customer::where('phone_number',$request->phone_number)->first();
					if(empty($cust))
					{
						$data1=[
							'customer_name'=>$request->customer_name,
							'country_code'=>$request->country_code,
							'phone_number'=>$request->phone_number,
							'mobile'=>$request->country_code.$request->phone_number,
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


// === EDIT PROPOSAL ===================================================================


public function editProposal($id)
{
	$vendor_id=User::getVendorId();
	$user_name=Auth::user()->user_name;

	$prop=Proposal::where('id',$id)->first();
	$data['phases']=ProposalValueHeading::orderby('id','ASC')->get();
	$data['items']=ProposalHeadingItem::orderby('id','ASC')->get();
	$data['customers']=Customer::orderby('id','ASC')->get();
	 
	$data['value_headings']=ProposalValueHeading::orderBy('id','ASC')->get();
	$data['values']=ProposalValue::where('proposal_id',$id)->get();
	
	return view('users.proposal.proposal_edit',compact('id','prop','data','user_name'));

}

public function viewProposalValuesForEdit(Request $request,$id)
    {
      
      $pvalue = ProposalValue::where('proposal_id',$id)->orderby('id','ASC')
			->when($request->heading_id,function($query,$search){
                return $query ->where('proposal_value_heading_id', $search);
            })->get();
	
        return Datatables::of($pvalue)
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
			$action='<a href="javascript:;" class="btn btn-white btn-white-sm edit-item" id="'.$row->id.'"
			data-includeoption="'.$row->include_option.'" data-amount="'.$row->amount.'" data-bs-toggle="modal" data-bs-target="#edit-value-modal" ><i class="lni lni-pencil" style="color:blue;"></i></a>&nbsp;
					<a href="javascript:;" class="btn btn-white btn-white-sm del-item" id="'.$row->id.'" ><i class="lni lni-trash" style="color:red;"></i></a>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateProposalAndCustomer(Request $request)
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
				
		try
		{
			DB::beginTransaction();
			$prop_id=$request->prop_id;
			$prop=Proposal::where('id',$prop_id)->first();
			
			$result='';
			$phone=str_replace(' ','',$request->phone_number);
			if(!empty($prop))
			{

				$prop->proposal_name=$request->proposal_name;
				$prop->customer_name=$request->customer_name;
				$prop->country_code=$request->country_code;
				$prop->phone_number=$phone;
				$prop->mobile=$request->country_code.$phone;
				$prop->email=$request->email;
				$prop->activity=$request->activity;
				$prop->activity_code=$request->activity_code;
				$prop->juridiction=$request->juridiction;
				$prop->no_of_visa=$request->no_of_visa;
				$prop->shareholders=$request->shareholders;
				$prop->total_amount=$request->total_amount;
				$prop->discount=$request->discount;
				$result=$prop->save();
			}
				
			$cname=$request->old_customer_name;
			$cmobile=$request->country_code.$request->old_phone_number;
			
			$cust=Customer::where('mobile',$cmobile)->where('customer_name','like',$cname)->first();
			if(!empty($cust))
			{
				$cust->customer_name=$request->customer_name;
				$cust->country_code=$request->country_code;
				$cust->phone_number=$phone;
				$cust->mobile=$request->country_code.$phone;
				$cust->email=$request->email;
				$cust->activity=$request->activity;
				$cust->activity_code=$request->activity_code;
				$cust->juridiction=$request->juridiction;
				$cust->no_of_visa=$request->no_of_visa;
				$cust->shareholders=$request->shareholders;
				$cust->save();
			}
			
			DB::commit();
			
			if($result)
			{
				$data=['cname'=>$request->customer_name,'ccode'=>$request->country_code,'mobile'=>$phone];
				return response()->json(['msg'=>'Details successfully updated.','data'=>$data,'status'=>true]);
			}
			else
			{
				DB::rollback();
				return response()->json(['msg'=>'Something wrong, Try again.','status'=>false]);
			}
	   }
		catch(\Exception $e)
		{
		   DB::rollback();
		   return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
		}
	} 
}

public function updateProposalItemValue(Request $request)
{

	$pv=ProposalValue::where('id',$request->item_id)->first();
	try
	{
		$pv->include_option=$request->item_option_edit;
		$pv->amount=$request->item_amount_edit;
		$result=$pv->save();
		
		return response()->json(['msg'=>'Item values updated.','status'=>true]);
	}
	catch(\Exception $e)
	{
		return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
	}
}


public function addNewProposalItem(Request $request)
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
				$item_sec=explode(',',$request->item_section);
				
				$data=[
					'proposal_id'=>$request->propo_id,
					'proposal_value_heading_id'=>$item_sec[0],
					'proposal_value_heading'=>$item_sec[1],
					'proposal_heading_item'=>$request->item_name,
					'include_option'=>$request->item_option,
					'currency'=>Auth::user()->currency,
					'amount'=>$request->item_amount,
				];
	
				$result=ProposalValue::create($data);

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


public function deleteProposalValue($id)
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




}
