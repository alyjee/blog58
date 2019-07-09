<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FlightDetail extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'form_id', 'day', 'date', 'flight_status', 'city_terminal_stopover', 'time', 'flight_class_status', 'stop_eqp_flts', 'archive', 'created_at', 'updated_at'];

    public static $all_fields = ['id', 'form_id', 'day', 'date', 'flight_status', 'city_terminal_stopover', 'time', 'flight_class_status', 'stop_eqp_flts', 'archive', 'created_at', 'updated_at'];

    /*
    *
    * Database Relations
    */

    
    
}
