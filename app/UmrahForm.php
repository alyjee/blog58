<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UmrahForm extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'ref_num', 'person_name', 'total_passengers', 'total_days', 'from_date', 'to_date', 'adults', 'childs', 'infants', 'package_category', 'room_category', 'transport', 'airline', 'flight_type', 'makkah_hotel_nights', 'makkah_hotel', 'makkah_hotel_category', 'makkah_hotel_meal_plan', 'makkah_hotel_room_price', 'madinah_hotel_nights', 'madinah_hotel', 'madinah_hotel_category', 'madinah_hotel_meal_plan', 'madinah_hotel_room_price', 'stage', 'adult_ticket_price', 'child_ticket_price', 'infant_ticket_price', 'total_ticket_price', 'umrah_per_person', 'total_umrah_price', 'total_package_price', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    public static function getRefNum(){
        $num_str = sprintf("%06d", mt_rand(1, 999999));
        return 'SL'.$num_str;
    }

    public static function getProposedForms(){
        $query = UmrahForm::where('archive', 0)->where('stage', 'proposed');
        return $query->get();
    }

    public static function getFinalForms(){
        $query = UmrahForm::where('archive', 0)->where('stage', 'final');
        return $query->get();
    }

    public static function getFlightTypes(){
        $categories = [];
        $categories['direct'] = 'Direct';
        $categories['indirect'] = 'In Direct';
        return $categories;
    }

    
}
