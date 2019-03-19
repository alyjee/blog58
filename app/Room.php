<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Room extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'category', 'name', 'archive', 'created_at', 'updated_at'];

    /*
    *
    * Database Relations
    */

    public function hotel(){
        return $this->belongsTo('App\Hotel', 'id', 'hotel_id');
    }

    public static function getHotels(){
    	$query = Hotel::where('archive', 0);
    	return $query->get();
    }

    public static function getHotelsForSelect(){
        return Hotel::where('archive',0)->pluck('name', 'id')->toArray();
    }

    public static function getRoomCapacities(){
        $capacities = [];
        $capacities['double'] = 'Double';
        $capacities['triple'] = 'Triple';
        $capacities['quad'] = 'Quad';
        $capacities['quint'] = 'Quint';
        return $capacities;
    }
}
