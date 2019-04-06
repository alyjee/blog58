<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Package extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'name', 'price', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */

    public static function getPackages(){
    	$query = Package::where('archive', 0);
    	return $query->get();
    }

    public static function getPackagesForSelect(){
        return Package::where('archive',0)->pluck('name', 'id')->toArray();
    }
    
}
