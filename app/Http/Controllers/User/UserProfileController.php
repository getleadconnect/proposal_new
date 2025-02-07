<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Facades\FileUpload;

use App\Models\User;
use App\Models\UserDetail;

use Validator;

use DataTables;
use Session;
use Auth;
use Log;
use DB;

class UserProfileController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	$vendor_id=User::getVendorId();
	$udt=UserDetail::where('vendor_id',$vendor_id)->first();
	return view('users.profile.user_profile',compact('udt'));
  }	
  

public function edit($id)
{
	$usr=User::where('pk_int_user_id',$id)->first();
	return view('admin.users.edit_user',compact('usr'));
}


  public function updateUserProfile(Request $request)
    {

        $validator=validator::make($request->all(),[
		'company_name' => 'required',
        'email' => 'required|email',
        'mobile' => 'required|numeric|digits_between:8,15',
        'address'=>'required',
		'location'=>'required',
		'country'=>'required',
		'currency'=>'required'
		]);
        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
			try{

				$user_dt_id=$request->user_dt_id;
				
				$data=[
					'company_name'=>$request->company_name,
					'email'=>$request->email,
					'country_code'=>$request->country_code,
					'mobile_number'=>trim($request->mobile),
					'address'=>$request->address,
					'location'=>$request->location,
					'country'=>$request->country,
					'currency'=>$request->currency,
				];
						
				$result=UserDetail::where('id',$user_dt_id)->update($data); 
				
				if($result)
        		{   
					return response()->json(['msg'=>'User details successfully updated.','status'=>true]);
        		}
        		else
        		{
					return response()->json(['msg'=>'Something wrong, try again.','status'=>false]);
        		}
	
            }
            catch(\Exception $e)
            {
                return response()->json(['msg'=>$e->getMessage(),'status'=>false]);
            }
        } 
    }

public function uploadProfileImage(Request $request)
{
		$file_image= $request->picField;  
	
        $usr =  UserDetail::where('id',$request->userDtId)->first();
		if($usr and $usr->logo!="")
		{
			Storage::disk('local')->delete($usr->logo);
		}			
		
		if($request->file('picField'))
		{
			$file_image= $request->picField;
			$fname = 'logos/'.mt_rand()."_".date('his').'.'. $file_image->getClientOriginalExtension();
			Storage::disk('local')->put($fname, file_get_contents($file_image));
        		//$fname2=Storage::disk('local')->putFile("uploads/logos",$request->file('picField'), 'public');
				//$fname2=str_replace("video_files/","",$fname2);
		}
		
        $usr->logo=$fname;                    
        $usr->save();

        return redirect()->back()->with('success', 'Logo successfully updated!');
}

public function changePassword(Request $request)
{
	
	$validator=validator::make($request->all(),[
		'new_pass' => 'required|max:15',
        'confirm_pass' => 'required|max:15',
        ]);
        if ($validator->fails()) 
		{
			return response()->json(['msg'=>$validator->messages()->first(),'status'=>false]);
		}
		else
		{
	
			$user_id=Auth::user()->pk_int_user_id;
			
			$npas=$request->new_pass;
			$data=['password'=>Hash::make($npas)];
			
			$result=User::where('pk_int_user_id',$user_id)->update($data);
			if($result)
			{   
				return response()->json(['msg'=>'User password updated.','status'=>true]);
			}
			else
			{
				return response()->json(['msg'=>'Something wrong, try again.','status'=>false]);
			}
		}
	
}




}
