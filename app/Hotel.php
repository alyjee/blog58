<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Hotel extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'name', 'category', 'double', 'triple', 'quad', 'quint', 'room_basis', 'distance_from_haram', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    public function pricings(){
        return $this->hasMany('\App\PricingPeriod', 'hotel_id')->where('archive', 0);
    }

    public static function getHotels(){
    	$query = Hotel::where('archive', 0)->orderby('id', 'desc');
    	return $query->get();
    }

    public static function getHotelsForSelect(){
        return Hotel::where('archive',0)->pluck('name', 'id')->toArray();
    }

    public static function getHotelCategories(){
        $categories = [];
        $categories[1] = '1 Star';
        $categories[2] = '2 Star';
        $categories[3] = '3 Star';
        $categories[4] = '4 Star';
        $categories[5] = '5 Star';
        return $categories;
    }

    public static function getHotelRoomCategories(){
        $categories = [];
        $categories['double'] = 'Double';
        $categories['triple'] = 'Triple';
        $categories['quad'] = 'Quad';
        $categories['quint'] = 'Quint';
        return $categories;
    }
}
