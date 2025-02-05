<?php

namespace App\Http\Controllers\User;

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
use DB;

class DashboardController extends Controller
{
  public function __construct()
  {
     //$this->middleware('admin');
  }
  
  public function index()
  {
	
	return view('users.dashboard.dashboard');
	
  }	
      
 
   
}
