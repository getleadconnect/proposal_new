<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


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
	 return view('admin.dashboard');
  }	
  
 
}
