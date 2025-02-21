<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Facades\FileUpload;

use App\Models\User;
use App\Models\Designation;


use Validator;

use DataTables;
use Session;
use Auth;
use Log;


class DesignationController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	 return view('users.settings.designation_list');
  }	

    
  public function store(Request $request)
    {
        // return $request;
		$vendor_id=User::getVendorId();

        $validator=validator::make($request->all(),[
			'designation'=>'required',
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
					'designation'=>$request->designation,
					'status'=>1,
				];
				
	
				$result=Designation::create($data);

				if($result)
        		{   
					return response()->json(['msg'=>'Designations added.','status'=>true]);
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
    	
	
 public function viewDesignations()
    {
      $id=User::getVendorId();

      $desig = Designation::where('vendor_id',$id)->orderby('id','DESC')->get();
	
        return Datatables::of($desig)
		->addIndexColumn()
		->addColumn('designation', function ($row) {
			return $row->designation;
        })
		
        ->addColumn('action', function ($row)
        {
		
			$action='<div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="fadeIn animated bx bx-dots-vertical"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item edit-desig" href="javascript:void(0)" id="'.$row->id.'" data-designation="'.$row->designation.'" data-bs-toggle="modal" data-bs-target="#edit-modal"  ><i class="lni lni-pencil-alt"></i> Edit</a></li>
                              <li><a class="dropdown-item delete-desig" href="javascript:void(0)" id="'.$row->id.'"><i class="lni lni-trash"></i> Delete</a></li>
							  </ul>
                        </div>';
			return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


public function updateDesignation(Request $request)
    {

        $validator=validator::make($request->all(),[
			'designation_edit'=>'required',
		]);

        if ($validator->fails()) 
		{
			Session::flash('fail',$validator->messages()->first());
		}
		else
		{
			try{

				$id=$request->desig_id;

				$data=[
					'designation'=>$request->designation_edit,
				];
				$result=Designation::where('id',$id)->update($data);
				if($result)
        		{   
					Session::flash('success','Designation successfully updated.');
        		}
        		else
        		{
					Session::flash('fail','Something wrong, try again.');
        		}
	
            }
            catch(\Exception $e)
            {
                Session::flash('fail',$e->getMessage());
            }
			
			return redirect('users/designations');
        } 
    }


public function destroy($id)
{
	try
	{
		$res=Designation::where('id',$id)->delete();
		
		if($res)
		{   
			return response()->json(['msg'=>'Designation successfully removed.','status'=>true]);
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

public function activateDeactivate($op,$id)
	{
		if($op==1)
		{
		   $new=['int_status'=>1];
		}
		else
		{	
		   $new=['int_status'=>0];
		}

		$result=User::where('pk_int_user_id',$id)->update($new);
		
			if($result)
			{
				if($op==1)
					return response()->json(['msg' =>'User successfully activated!' , 'status' => true]);
				else
				    return response()->json(['msg' =>'User successfully deactivated!' , 'status' => true]);
			}
			else
			{
				return response()->json(['msg' =>'Something wrong, try again!' , 'status' => false]);
			}				

	}

}
