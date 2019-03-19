<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Hotel extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'category', 'name', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */

    public function rooms(){
        return $this->hasMany('App\Room', 'hotel_id', 'id');
    }

    public static function getHotels(){
    	$query = Hotel::where('archive', 0);
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
}
