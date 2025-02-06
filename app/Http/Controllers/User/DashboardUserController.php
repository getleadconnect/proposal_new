<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Proposal;

use Validator;
use DataTables;
use Session;
use Auth;
use Log;
use Carbon\Carbon;
use DB;

class DashboardUserController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	$vendor_id=User::getVendorId();
	
	$data['total_count']=Proposal::proposalCount($vendor_id);
	$data['this_month']=Proposal::proposalThisMonth($vendor_id);
		
	return view('users.dashboard.dashboard',compact('data'));
  }	

      
 
   
}
