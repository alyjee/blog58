<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PricingPeriod extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'hotel_id', 'from_date', 'to_date', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */

    public static function getPricingPeriodByDates($hid, $fdate, $tdate){
    	return PricingPeriod::where('hotel_id', $hid)->where('from_date', '<=', $fdate)->where('to_date', '>=', $tdate)->where('archive', 0)->first();
    }

    public function pricing_features(){
        return $this->hasMany('App\PricingFeature', 'pricing_period_id', 'id');
    }
    
}
