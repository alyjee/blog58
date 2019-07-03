<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UmrahForm extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'ref_num', 'person_name', 'total_passengers', 'total_days', 'from_date', 'to_date', 'adults', 'childs', 'infants', 'package_category', 'transport', 'makkah_hotel', 'makkah_hotel_category', 'makkah_hotel_meal_plan', 'makkah_double_price', 'makkah_double_qty', 'makkah_triple_price', 'makkah_triple_qty', 'makkah_quad_price', 'makkah_quad_qty', 'makkah_quint_price', 'makkah_quint_qty', 'makkah_sharing_price', 'makkah_sharing_qty', 'makkah_weekend_price_price', 'makkah_weekend_price_qty', 'makkah_haram_view_price_price', 'makkah_haram_view_price_qty', 'makkah_full_board_per_pax_per_day_price', 'makkah_full_board_per_pax_per_day_qty', 'makkah_four_nights_price_price', 'makkah_four_nights_price_qty', 'makkah_extra_bed_price_price', 'makkah_extra_bed_price_qty', 'madinah_from_date', 'madinah_to_date', 'madinah_hotel_nights', 'madinah_hotel', 'madinah_hotel_category', 'madinah_hotel_meal_plan', 'madinah_double_price', 'madinah_double_qty', 'archive', 'created_at', 'updated_at', 'madinah_triple_price', 'madinah_triple_qty', 'madinah_quad_price', 'madinah_quad_qty', 'madinah_quint_price', 'madinah_quint_qty', 'madinah_sharing_price', 'madinah_sharing_qty', 'madinah_weekend_price_price', 'madinah_weekend_price_qty', 'madinah_haram_view_price_price', 'madinah_haram_view_price_qty', 'madinah_full_board_per_pax_per_day_price', 'madinah_full_board_per_pax_per_day_qty', 'madinah_four_nights_price_price', 'madinah_four_nights_price_qty', 'madinah_extra_bed_price_price', 'madinah_extra_bed_price_qty', 'stage', 'adult_ticket_price', 'child_ticket_price', 'infant_ticket_price', 'total_ticket_price', 'umrah_per_person', 'total_umrah_price', 'total_package_price', 'total_package_price_pkr', 'airline', 'flight_type', 'makkah_from_date', 'makkah_to_date', 'makkah_hotel_nights'];

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

    public static function getTransportTypes(){
        $categories = [];
        $categories['private'] = 'Private';
        $categories['sharing'] = 'Sharing';
        return $categories;
    }

    
}
