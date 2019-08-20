<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Supplier extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'name', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    public function hotels(){
        return $this->hasMany('\App\Hotel');
    }

    public static function getSuppliers(){
    	$query = Supplier::where('archive', 0);
    	return $query->get();
    }

    public static function getSuppliersForSelect(){
        return Supplier::where('archive',0)->pluck('name', 'id')->toArray();
    }

    public static function getSupplierById($id){
        $query = Supplier::where('archive', 0)->where('id', $id);
        return $query->first();
    }
    
}
