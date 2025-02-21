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

use Validator;

use DataTables;
use Session;
use Auth;
use Log;


class ProposalHeadingsController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	 return view('users.proposal_sections.proposal_headings');
  }	
  
  public function banners()
  {
	 return view('users.proposal_sections.proposal_banners');
  }	
  
  public function valueHeadings()
  {
	 return view('users.proposal_sections.proposal_value_headings');
  }	

  public function headingItems()
  {
	 return view('users.proposal_sections.proposal_heading_items');
  }	
  
  public function specialServices()
  {
	 return view('users.proposal_sections.proposal_special_services');
  }	
    
  public function otherServices()
  {
	 return view('users.proposal_sections.proposal_other_services');
  }	
     
  public function bankDetails()
  {
	 return view('users.proposal_sections.proposal_bank_details');
  }	
    
  public function documents()
  {
	 return view('users.proposal_sections.proposal_documents');
  }	
    
  public function timelines()
  {
	 return view('users.proposal_sections.proposal_process_timelines');
  }	
    
 public function notes()
  {
	 return view('users.proposal_sections.proposal_notes');
  }	
	
 public function conditions()
  {
	 return view('users.proposal_sections.proposal_conditions');
  }	
   
 
 
// OTHER HEADING SECTIONS===========================================================================

public function store(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'heading'=>'required',
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
					'heading'=>$request->heading,
				];
	
				$result=ProposalHeading::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Heading added.','status'=>true]);
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
    	
	
 public function viewProposalHeadings()
    {
      $id=User::getVendorId();

      $desig = ProposalHeading::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($desig)
		->addIndexColumn()
		->addColumn('heading', function ($row) {
			return strtoupper($row->heading);
        })
		
        ->addColumn('action', function ($row)
        {
			$del='';
			if($row->id>7)
			$del='<li><a class="dropdown-item delete-head" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>';
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-head" href="javascript:void(0)" id="'.$row->id.'" data-heading="'.$row->heading.'" data-bs-toggle="modal" data-bs-target="#edit-heading-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
							  '.$del.'
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateHeading(Request $request)
    {

        $validator=validator::make($request->all(),[
			'heading_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->head_id;

				$data=[
					'heading'=>$request->heading_edit,
				];
				$result=ProposalHeading::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Heading successfully updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }


public function destroy($id)
{
	try
	{
		$res=ProposalHeading::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Heading successfully removed.','status'=>true]);
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




//  IN TEMPLATE, VALUE REQUIRED - PHASE HEADING SECTIONS===========================================================
       
  
  public function saveValueHeading(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'value_heading'=>'required',
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
					'value_heading'=>$request->value_heading,
				];
	
				$result=ProposalValueHeading::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Heading successfully added.','status'=>true]);
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
    	
	
 public function viewProposalValueHeadings()
    {
      $id=User::getVendorId();

      $desig = ProposalValueHeading::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($desig)
		->addIndexColumn()
		->addColumn('heading', function ($row) {
			return strtoupper($row->value_heading);
        })
		
        ->addColumn('action', function ($row)
        {
			$del='';
			if($row->id>5)
				$del='<li><a class="dropdown-item delete-head" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>';
		
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-head" href="javascript:void(0)" id="'.$row->id.'" data-valueheading="'.$row->value_heading.'" data-bs-toggle="modal" data-bs-target="#edit-value-heading-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              '.$del.'
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateValueHeading(Request $request)
    {

        $validator=validator::make($request->all(),[
			'value_heading_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->head_id;

				$data=[
					'value_heading'=>$request->value_heading_edit,
				];
				$result=ProposalValueHeading::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Heading successfully updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }


public function deleteValueHeading($id)
{
	try
	{
		$res=ProposalValueHeading::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Heading successfully removed.','status'=>true]);
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


// HEADING ITEMS ==============================================================================


public function saveHeadingItem(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'item_name'=>'required',
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
					'item_name'=>$request->item_name,
				];
	
				$result=ProposalHeadingItem::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Heading item added.','status'=>true]);
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
    	
	
 public function viewHeadingItems()
    {
      $id=User::getVendorId();

      $desig = ProposalHeadingItem::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($desig)
		->addIndexColumn()
		->addColumn('item_name', function ($row) {
			return strtoupper($row->item_name);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-item" href="javascript:void(0)" id="'.$row->id.'" data-itemname="'.$row->item_name.'" data-bs-toggle="modal" data-bs-target="#edit-item-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-item" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateHeadingItem(Request $request)
    {

        $validator=validator::make($request->all(),[
			'item_name_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->item_id;

				$data=[
					'item_name'=>$request->item_name_edit,
				];
				$result=ProposalHeadingItem::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Heading item updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }


public function deleteHeadingItem($id)
{
	try
	{
		$res=ProposalHeadingItem::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Heading item removed.','status'=>true]);
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


// Special services =======================================================================


public function saveSpecialService(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'service_data'=>'required',
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
					'service_data'=>$request->service_data,
				];
	
				$result=ProposalSpecialService::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Special service added.','status'=>true]);
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
    	
	
 public function viewSpecialServices()
    {
      $id=User::getVendorId();

      $serv = ProposalSpecialService::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('service_data', function ($row) {
			return strtoupper($row->service_data);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-sp-service" href="javascript:void(0)" id="'.$row->id.'" data-servicedata="'.$row->service_data.'" data-bs-toggle="modal" data-bs-target="#edit-special-service-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-sp-service" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateSpecialService(Request $request)
    {

        $validator=validator::make($request->all(),[
			'service_data_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->service_id;

				$data=[
					'service_data'=>$request->service_data_edit,
				];
				$result=ProposalSpecialService::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Special Servcie updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }


public function deleteSpecialService($id)
{
	try
	{
		$res=ProposalSpecialService::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Special service removed.','status'=>true]);
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

// Other services ==============================================================================


public function saveOtherService(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'other_service'=>'required',
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
					'other_service'=>$request->other_service,
				];
	
				$result=ProposalOtherService::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'other service added.','status'=>true]);
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
    	
	
 public function viewOtherServices()
    {
      $id=User::getVendorId();

      $serv = ProposalOtherService::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('other_service', function ($row) {
			return strtoupper($row->other_service);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-other-service" href="javascript:void(0)" id="'.$row->id.'" data-otherservice="'.$row->other_service.'" data-bs-toggle="modal" data-bs-target="#edit-other-service-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-other-service" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateOtherService(Request $request)
    {

        $validator=validator::make($request->all(),[
			'other_service_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->other_service_id;

				$data=[
					'other_service'=>$request->other_service_edit,
				];
				$result=ProposalOtherService::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Special Servcie updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        }
    }


public function deleteOtherService($id)
{
	try
	{
		$res=ProposalOtherService::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Other service removed.','status'=>true]);
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

// Bank Details ==============================================================================


public function saveBankDetails(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
					'bank_name'=>'required',
					'account_name'=>'required',
					'iban_number'=>'required',
					'swift_code'=>'required',
					'account_no'=>'required',
					'currency'=>'required',
					'branch_name'=>'required',
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
					'bank_name'=>$request->bank_name,
					'account_name'=>$request->account_name,
					'iban_number'=>$request->iban_number,
					'swift_code'=>$request->swift_code,
					'account_number'=>$request->account_no,
					'currency'=>$request->currency,
					'branch_name'=>$request->branch_name,
				];
	
				$result=ProposalBankDetail::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Bank details added.','status'=>true]);
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
    	
	
 public function viewBankDetails()
    {
      $id=User::getVendorId();

      $serv = ProposalBankDetail::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('bnk_name', function ($row) {
			return strtoupper($row->bank_name);
        })
		
		->addColumn('ac_name', function ($row) {
			return strtoupper($row->account_name);
        })
		->addColumn('iban', function ($row) {
			return strtoupper($row->iban_number);
        })
		->addColumn('scode', function ($row) {
			return strtoupper($row->swift_code);
        })
		->addColumn('ac_number', function ($row) {
			return strtoupper($row->account_number);
        })
		->addColumn('currency', function ($row) {
			return strtoupper($row->currency);
        })
		->addColumn('branch', function ($row) {
			return strtoupper($row->branch_name);
        })
		->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-bank" href="javascript:void(0)" id="'.$row->id.'"  data-bs-toggle="modal" data-bs-target="#edit-bank-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-bank" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

public function edit($id)
{
	
	$bnk=ProposalBankDetail::where('id',$id)->first();
	if(!empty($bnk))
	{
		return response()->json(['msg'=>"Bank details found.",'data'=>$bnk,'status'=>true]);
	}
	else
	{
		return response()->json(['msg'=>"Bank details were not found.",'data'=>[],'status'=>false]);
	}
	
	
}



public function updateBankDetails(Request $request)
    {

        $validator=validator::make($request->all(),[
			
			'bank_name_edit'=>'required',
			'account_name_edit'=>'required',
			'iban_number_edit'=>'required',
			'swift_code_edit'=>'required',
			'account_no_edit'=>'required',
			'currency_edit'=>'required',
			'branch_name_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->bank_id_edit;

					$data=[
					'bank_name'=>$request->bank_name_edit,
					'account_name'=>$request->account_name_edit,
					'iban_number'=>$request->iban_number_edit,
					'swift_code'=>$request->swift_code_edit,
					'account_number'=>$request->account_no_edit,
					'currency'=>$request->currency_edit,
					'branch_name'=>$request->branch_name_edit,
				];
				
				$result=ProposalBankDetail::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Bank details updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        }
    }


public function deleteBankDetails($id)
{
	try
	{
		$res=ProposalBankDetail::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Bank details removed.','status'=>true]);
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

// Process Timelines ===============================================================================


public function saveProcessTimeline(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'timeline'=>'required',
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
					'process_timeline'=>$request->timeline,
				];
	
				$result=ProposalTimeline::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Process timeline added.','status'=>true]);
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
    	
	
 public function viewProcessTimelines()
    {
      $id=User::getVendorId();

      $serv = ProposalTimeline::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('timeline', function ($row) {
			return strtoupper($row->process_timeline);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-timeline" href="javascript:void(0)" id="'.$row->id.'" data-timeline="'.$row->process_timeline.'" data-bs-toggle="modal" data-bs-target="#edit-process-timeline-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-timeline" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateProcessTimeline(Request $request)
    {

        $validator=validator::make($request->all(),[
			'timeline_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->timeline_id;

				$data=[
					'process_timeline'=>$request->timeline_edit,
				];
				$result=ProposalTimeline::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Process timeline updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        }
    }


public function deleteTimeline($id)
{
	try
	{
		$res=ProposalTimeline::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Process timeline removed.','status'=>true]);
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

//DOCUMENTS REQUIRED ============================================================================


public function saveDocument(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'document'=>'required',
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
					'document_value'=>$request->document,
				];
	
				$result=ProposalDocument::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Document details added.','status'=>true]);
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
    	
	
 public function viewDocuments()
    {
      $id=User::getVendorId();

      $serv = ProposalDocument::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('document', function ($row) {
			return strtoupper($row->document_value);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-doc" href="javascript:void(0)" id="'.$row->id.'" data-document="'.$row->document_value.'" data-bs-toggle="modal" data-bs-target="#edit-document-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-doc" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateDocument(Request $request)
    {

        $validator=validator::make($request->all(),[
			'document_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->document_id;

				$data=[
					'document_value'=>$request->document_edit,
				];
				$result=ProposalDocument::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Document details updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        }
    }


public function deleteDocument($id)
{
	try
	{
		$res=ProposalDocument::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Document details removed.','status'=>true]);
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


//NOTES ============================================================================


public function saveNote(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'note'=>'required',
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
					'note'=>$request->note,
				];
	
				$result=ProposalNote::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Note successfully added.','status'=>true]);
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
    	
	
 public function viewNotes()
    {
      $id=User::getVendorId();

      $serv = ProposalNote::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('note', function ($row) {
			return strtoupper($row->note);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-note" href="javascript:void(0)" id="'.$row->id.'" data-note="'.$row->note.'" data-bs-toggle="modal" data-bs-target="#edit-note-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-note" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateNote(Request $request)
    {

        $validator=validator::make($request->all(),[
			'note_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->note_id;

				$data=[
					'note'=>$request->note_edit,
				];
				$result=ProposalNote::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Document details updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        }
    }


public function deleteNote($id)
{
	try
	{
		$res=ProposalNote::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Note successfully removed.','status'=>true]);
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

//TERMS & CONDITIONS ============================================================================

public function saveCondition(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'condition'=>'required',
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
					'condition'=>$request->condition,
				];
	
				$result=ProposalCondition::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Condition successfully added.','status'=>true]);
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
    	
	
 public function viewConditions()
    {
      $id=User::getVendorId();

      $serv = ProposalCondition::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($serv)
		->addIndexColumn()
		->addColumn('condition', function ($row) {
			return strtoupper($row->condition);
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-condi" href="javascript:void(0)" id="'.$row->id.'" data-condition="'.$row->condition.'" data-bs-toggle="modal" data-bs-target="#edit-condition-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-condi" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateCondition(Request $request)
    {

        $validator=validator::make($request->all(),[
			'condition_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->condition_id;

				$data=[
					'condition'=>$request->condition_edit,
				];
				$result=ProposalCondition::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Conditions successfully updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        }
    }


public function deleteCondition($id)
{
	try
	{
		$res=ProposalCondition::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Condition successfully removed.','status'=>true]);
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


// PROPOSAL BANNER SECTION===========================================================================

public function saveBanner(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'banner_text'=>'required',
			'banner'=>'required',
		]);
		
        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
            try
			{
				
				$fname="";

				if($request->file('banner'))
				{
					$ext=$request->file('banner')->getClientOriginalExtension();	 
					$filename = "bnr_".$vendor_id."_".date('Ymdhis')."_".$ext;
					$fname ="banners/".$filename;
					Storage::disk('local')->putFileAs("banners",$request->file('banner'), $filename, 'public');
				}
	
				$data=[
					'vendor_id'=>$vendor_id,
					'banner_text'=>$request->banner_text,
					'banner'=>$fname,
				];
	
				$result=ProposalBanner::create($data);

				if($result)
        		{   
					Session::flash('success','Banner successfully added.');
				}
        		else
        		{
					Session::flash('fail','Something wrong, Try again.');
        		}
				
				return redirect('users/proposal/banners');
           }
            catch(\Exception $e)
            {
			   Session::flash('fail',$e->getMessage());
			   return redirect()->back();
            }
        } 
    }
    	
	
 public function viewBanners()
    {
      $id=User::getVendorId();

      $banner = ProposalBanner::where('vendor_id',$id)->orderby('id','ASC')->get();
	
        return Datatables::of($banner)
		->addIndexColumn()
		->addColumn('banner_text', function ($row) {
			return strtoupper($row->banner_text);
        })
		->addColumn('banner', function ($row) {
			$img='<img src="'.url("/uploads/".$row->banner).'" style="width:150px;">';
			return $img;
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item delete-banner" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action','banner'])
        ->make(true);
    }


public function updateBanner(Request $request)
    {

        $validator=validator::make($request->all(),[
			'banner_text_edit'=>'required',
			'banner_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$id=$request->head_id;

				$data=[
					'banner_text'=>$request->banner_text_edit,
					'banner'=>$request->banner_edit,
				];
				$result=ProposalBanner::where('id',$id)->update($data);
				if($result)
        		{   
					return response()->json(['msg'=>"Banner successfully updated.",'status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>"Something wrong, try again.",'status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }


public function deleteBanner($id)
{
	try
	{
		$res=ProposalBanner::where('id',$id)->first();
		
		if($res)
		{   
			$img=$res->banner;
			$res->delete();
			Storage::disk('local')->delete($img);
	
			return response()->json(['msg'=>'Banner successfully removed.','status'=>true]);
		}
		else
		{
			return response()->json(['msg'=>$res,'status'=>false]);
		}
	}
	catch(\Exception $e)
	{
		return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
	}
}



}
