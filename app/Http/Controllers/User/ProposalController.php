<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Proposal;
use App\Models\ProposalValue;
use App\Models\ProposalBanner;
use App\Models\ProposalSpecialService;
use App\Models\ProposalOtherService;
use App\Models\ProposalTimeline;
use App\Models\ProposalNote;
use App\Models\ProposalCondition;
use App\Models\ProposalBankDetail;
use App\Models\ProposalDocument;
use App\Models\ProposalValueHeading;

use App\Models\Customer;
use Validator;

use DataTables;
use Session;
use Auth;
use Log;
use DB;
use PDF;
use Carbon\Carbon;

class ProposalController extends Controller
{
  
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	 $customer=Customer::orderBy('id','ASC')->get();
	 return view('users.proposal.proposal_list',compact('customer'));
  }	
  
  public function getProposals(Request $request)
    {
		
		if ($request->ajax())
		{
			$user_id=Auth::user()->id;
			$role_id=Auth::user()->role_id;
			
			$query = Proposal::select('proposals.*','users.user_name')->leftJoin('users','proposals.created_by','=','users.id');
			if($role_id==3)
			{
				$query->latest()->where('created_by',$user_id);
			}
			else
			{
				$query->latest();
			}
			
			$query->when($request->date_from, function ($q)use($request) {
				return $q->whereDate('created_at','>=',$request->date_from);
			})
			->when($request->date_to, function ($q) use($request) {
				return $q->whereDate('created_at','<=',$request->date_to);
			})
			->when($request->customer, function ($q)use($request) {
				return $q->where('customer_name','like',$request->customer.'%');
			});
			
			$data=$query->get();
			
			return Datatables::of($data)
					->addIndexColumn()
					
					->addColumn('created_on', function($row){
						$dat=date_create($row->created_at)->format('d-M-Y h:i:s A');
						return $dat;
					})
					
					->addColumn('cname', function($row){
						$mobile=$row->customer_name."<br><i class='fa fa-mobile'></i>: ".$row->country_code.$row->phone_number."<br><i class='fa fa-envelope'></i>: ".$row->email;
						return $mobile;
					})
					
					->addColumn('mobile', function($row){
						$mobile=$row->country_code.$row->phone_number;
						return $mobile;
					})
					->addColumn('visa', function($row){
						$visa=$row->no_of_visa."/".$row->shareholders;
						return $visa;
					})
					
					->addColumn('action', function($row){
						$edit_path = url('users/edit-proposal',$row->id);
						$del_path = url('users/delete-proposal',$row->id);
						$view_temp = url('users/view-proposal-template',$row->id);
						$gen_pdf = url('users/generate-pdf',$row->id);
						
						$btn = '<div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
								<a href="'.route('users.edit-proposal',$row->id).'" class="btn btn-white btn-edit" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
								<a href="'.$gen_pdf.'" class="btn btn-white btn-print" title="Download PDF"><i class="fa fa-print" aria-hidden="true"></i></a>&nbsp;
								<!--<a href="'.$edit_path.'" class="btn btn-white  btn-edit" id="'.$row->id.'"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;-->
								<a href="'.$view_temp.'" target="_blank" class="btn btn-white btn-view"><i class="fa fa-eye" aria-hidden="true" title="view"></i></a>&nbsp;
								<a href="javascript:;" class="btn btn-white btn-delete" id="'.$row->id.'"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
								</div>';
						return $btn;
						})
					->rawColumns(['cname','action'])
					->make(true);
		}

	}
  
  
	public function viewProposalInTemplate($id)
	{
		$vendor_id=User::getVendorId();
		$user_name=Auth::user()->user_name;
				
		$user_dt=UserDetail::where('vendor_id',$vendor_id)->first();
		$prop=Proposal::where('id',$id)->first();
		
		$banner=ProposalBanner::orderBy('id','DESC')->first();
		
		$data['value_headings']=ProposalValueHeading::orderBy('id','ASC')->get();
		$data['values']=ProposalValue::where('proposal_id',$id)->get();
		$data['special_service']=ProposalSpecialService::orderBy('id','ASC')->get();
		$data['other_service']=ProposalOtherService::orderBy('id','ASC')->get();
		$data['documents']=ProposalDocument::orderBy('id','ASC')->get();
		$data['bank_details']=ProposalBankDetail::orderBy('id','ASC')->get();
		$data['timeline']=ProposalTimeline::orderBy('id','ASC')->get();
		$data['notes']=ProposalNote::orderBy('id','ASC')->get();
		$data['conditions']=ProposalCondition::orderBy('id','ASC')->get();
		
		return view('users.proposal.proposal_template_view',compact('banner','user_dt','prop','data','user_name'));
	}
    
	public function generateProposalPdf($id)
	{

		try
		{
			$vendor_id=User::getVendorId();
			$user_name=Auth::user()->user_name;
				
			$user_dt=UserDetail::where('vendor_id',$vendor_id)->first();
			$prop=Proposal::where('id',$id)->first();
			
			$banner=ProposalBanner::orderBy('id','DESC')->first();
			
			$data['value_headings']=ProposalValueHeading::orderBy('id','ASC')->get();
			$data['values']=ProposalValue::where('proposal_id',$id)->get();
			$data['special_service']=ProposalSpecialService::orderBy('id','ASC')->get();
			$data['other_service']=ProposalOtherService::orderBy('id','ASC')->get();
			$data['documents']=ProposalDocument::orderBy('id','ASC')->get();
			$data['bank_details']=ProposalBankDetail::orderBy('id','ASC')->get();
			$data['timeline']=ProposalTimeline::orderBy('id','ASC')->get();
			$data['notes']=ProposalNote::orderBy('id','ASC')->get();
			$data['conditions']=ProposalCondition::orderBy('id','ASC')->get();

			if(!empty($user_dt))
			{
				$pdf = PDF::loadView('users.proposal.proposal_template',compact('banner','user_dt','prop','data','user_name'));
				$filename="proposal_".date('Ymdhis').".pdf";
				return $pdf->download($filename);
			}
			else
			{
				Session::flash('fail','Details not found.');
				return back();
			}
	
		}
		catch(\Exception $e)
		{
			\Log::info($e->getMessage());
			return false; 
		}
	}
  
  
  
public function destroy($id)
{
	
	try
	{
		$prop=Proposal::where('id',$id)->first();
		
		if($prop)
		{
			$res=$prop->delete();
			$res1=ProposalValue::where('proposal_id',$id)->delete();
			if($res)
			{   
				return response()->json(['msg'=>'Proposal successfully removed.','status'=>true]);
			}
			else
			{
				return response()->json(['msg'=>'Something wrong, Try again.','status'=>false]);
			}
		}
	}
	catch(\Exception $e)
	{
		return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
	}
}


}
