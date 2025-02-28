<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Stevebauman\Location\Facades\Location;

use guard;
use Illuminate\Http\Request;

use Session;
use App\Models\User;
use App\Common\Variables;
use Hash;
use Auth;

use Carbon\Carbon;

use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
	 
    public function userLogin(Request $request)
    {

		$validate = Validator::make(request()->all(),[
			'mobile' => 'required', 
            'password' => 'required',
        ]);
		
		if($validate->fails())
		{
			Session::flash('error','Invalid credentials. Try again');
			return back()->withErrors(['msg'=>"Invalid credenstials"]);
		}
		else
		{
		
			try
			{
				
				$credentials['mobile'] = substr($request->full_number,1);   //intlInput variable for mobile
				$credentials['password'] = $request->password;
				
				$user = User::where('status',1)->where('user_mobile', $credentials['mobile'])->first();
				
				if ($user && Hash::check($credentials['password'], $user->password)) 
				{
					Auth::login($user);

					$user->datetime_last_login = Carbon::now();
					$rs=$user->save();
									
					if ($user->status == Variables::ACTIVE)
					{
										
						if ($user->role_id == Variables::ADMIN) 
						{
							return redirect('admin/dashboard');
						}
						else if($user->role_id==Variables::USER)
						{
							 return redirect('users/dashboard');
						}
						else  //staff
						{
							 return redirect('users/staff-dashboard');
						}
						
					}
					else
					{
						Session::flash('error','Your account has been deactivated,Please contact your administrator');
					}

				}
				else
				{
					Session::flash('error','Invalid credentials. Try again');
					return back();
				}			
			}
			catch(\Exception $e)
			{
				Session::flash('error',$e->getMessage());
				
			}
		
		}
	
	}
	
	
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('login');
    }
}
