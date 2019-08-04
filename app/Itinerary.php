<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Itinerary extends Model
{

    public $timestamps = true;

    protected $fillable = ['id', 'form_id', 'iternary_from_date', 'iternary_to_date', 'iternary_hotel_nights', 'iternary_hotel_category', 'iternary_hotel', 'iternary_city', 'iternary_double_price', 'iternary_double_qty', 'iternary_double_total', 'iternary_triple_price', 'iternary_triple_qty', 'iternary_triple_total', 'iternary_quad_price', 'iternary_quad_qty', 'iternary_quad_total', 'iternary_quint_price', 'iternary_quint_qty', 'iternary_quint_total', 'iternary_sharing_price', 'iternary_sharing_qty', 'iternary_sharing_total', 'iternary_weekend_price_price', 'iternary_weekend_price_qty', 'iternary_weekend_price_total', 'iternary_haram_view_price_price', 'iternary_haram_view_price_qty', 'iternary_haram_view_price_total', 'iternary_full_board_per_pax_per_day_price', 'iternary_full_board_per_pax_per_day_qty', 'iternary_full_board_per_pax_per_day_total', 'iternary_four_nights_price_price', 'iternary_four_nights_price_qty', 'iternary_four_nights_price_total', 'iternary_extra_bed_price_price', 'iternary_extra_bed_price_qty', 'iternary_extra_bed_price_total', 'iternary_total', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    public function hotel(){
    	return $this->hasOne('App\Hotel', 'id', 'iternary_hotel');
    }

    public function category(){
    	return $this->hasOne('App\Category', 'id', 'iternary_hotel_category');
    }

    public function features(){
        return $this->hasMany('App\ItineraryFeature', 'itinerary_id', 'id');
    }
    
}
