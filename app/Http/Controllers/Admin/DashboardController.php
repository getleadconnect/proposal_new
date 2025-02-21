<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Validator;
use DataTables;
use Session;
use Auth;
use Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	 $data['user_count']=User::totalCount();
	 $data['month_count']=User::userThisMonth();
	 $data['week_count']=User::userThisWeek();
	 
	 return view('admin.dashboard',compact('data'));
  }	
  
 
}
