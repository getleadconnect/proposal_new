<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Auth;
use Carbon\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


	const ACTIVATE = 1;
    const DEACTIVATE = 0;

    const ADMIN = 1;
	const USER = 2;
	const STAFF = 3;

	protected $primaryKey = 'id';

	protected $guarded=[];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    /*protected $fillable = [
        'user_name', 'email','countrycode', 'mobile','password','datetime_last_login','role_id','status',
    ];*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
	
	public static function getVendorId()
    {
        if(auth()->check()){
            if (Auth::user()->role_id == 1) {
                $vendorId = Auth::user()->id;
            } elseif (Auth::user()->role_id == 2) {
                $vendorId = Auth::user()->id;
            } else{
                $vendorId = Auth::user()->parent_user_id;
            }
            return $vendorId;
        }else{
            return null;
        }
    }
	
	public function scopeActive()
    {
            return $this->where('status',1);
    }

    public function isAdmin()
    {
        if (Auth::user()->role_id == 1) {
            return true;
        }
    }
	
	public function isUser()
    {
        if (Auth::user()->role_id == 2) {
            return true;
        }
    }
	
	public function isStaff()
    {
        if (Auth::user()->role_id == 3) {
            return true;
        }
    }
	
	
    public static $userRule = [
        'user_name' => 'required|max:25',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|numeric|digits_between:8,15|unique:users,user_mobile',
        'password' => 'required|min:6',
        // 'password_confirmation' => 'required_with:password|confirmed|min:6'
    ];

 
    public static $userRuleMessage = [
        'user_name.required' => 'Username is required',
        'email.required' => 'Email is required',
        'email.email' => 'Incorrect Email format',
        'mobile.required' => 'Mobile Number is required',
        'mobile.numeric' => 'Enter number in correct format ',
    ];
		
	public static $userUpdate = [
        'user_name_edit' => 'required|max:25',
        'email_edit' => 'required',
        'mobile_edit' => 'required|numeric|digits_between:8,15',
    ];
	 
    public static $updateMessage = [
        'user_name_edit.required' => 'Username is required',
        'email_edit.required' => 'Email is required',
        'email_edit.email' => 'Incorrect Email format',
        'mobile_edit.required' => 'Mobile Number is required',
        'mobile_edit.numeric' => 'Enter number in correct format ',
    ];

	
	public static function totalCount()
	{
		return self::count();
	}
	
	public static function userThisMonth()
	{
		return self::whereMonth('created_at',date('m'))->count();
	}
	
	public static function userThisWeek()
	{
		$now = Carbon::now();
		$weekStartDate = $now->startOfWeek();
		$weekEndDate = $now->endOfWeek();
		return self::whereBetween('created_at',[$weekStartDate,$weekEndDate])->count();
	}
	
	
	
	
	
	
	
	
	
	
	
}
