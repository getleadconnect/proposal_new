<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
	protected $primaryKey = 'id';
	protected $guarded=[];
	
	
	public static function proposalCount()
	{
		return self::count();
	}
	
	public static function proposalThisMonth()
	{
		return self::whereMonth('created_at',date('m'))->count();
	}
	
	public static function proposalThisWeek()
	{
		$now = Carbon::now();
		$weekStartDate = $now->startOfWeek();
		$weekEndDate = $now->endOfWeek();
		return self::whereBetween('created_at',[$weekStartDate,$weekEndDate])->count();
	}
	
	
}
