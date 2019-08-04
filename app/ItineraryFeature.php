<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ItineraryFeature extends Model
{

    public $timestamps = false;

    protected $fillable = ['id', 'itinerary_id', 'name', 'weekday_price', 'weekend_price', 'qty', 'weekdays', 'weekends'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    
}
