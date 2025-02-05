<?php

namespace App\Common;

use App\Country;
use App\Models\User;

use Carbon\Carbon;
use Auth;

class Variables
{
    const ADMIN = 1;
    const USER = 2;
	const STAFF = 3;
    
    const ACTIVE = 1;
    const DEACTIVE = 0;


    /**
     * @return mixed
     *
     */
    public static function getCountryList()
    {
        $countries = Country::select('id', 'name')->get();
        return $countries;
    }
	
	
}
