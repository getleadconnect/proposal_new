<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    
	protected $primaryKey = 'id';

	protected $guarded=[];
	
	public static function proposalCount($vendor_id)
	{
		return self::where('vendor_id',$vendor_id)->count();
	}
	
	public static function proposalThisMonth($vendor_id)
	{
		return self::where('vendor_id',$vendor_id)->whereMonth('created_at',date('m'))->count();
	}
	
	public static function proposalThisWeek($vendor_id)
	{
		
		return $sdate_cnt;
	}
}
