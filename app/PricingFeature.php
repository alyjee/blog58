<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PricingFeature extends Model
{
    //
    public $timestamps = false;

    protected $fillable = ['id', 'pricing_period_id', 'name', 'price'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    
    
}
