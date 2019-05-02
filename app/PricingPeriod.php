<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PricingPeriod extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'hotel_id', 'from_date', 'to_date', 'double', 'triple', 'quad', 'quint', 'sharing', 'weekend_price', 'haram_view_price', 'bf_per_pax_per_day', 'full_board_per_pax_per_day', 'four_nights_price', 'extra_bed_price', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */

    public static function getPricingPeriodByDates($hid, $fdate, $tdate){
    	return PricingPeriod::where('hotel_id', $hid)->where('from_date', '<=', $fdate)->where('to_date', '>=', $tdate)->where('archive', 0)->first();
    }
    
}
