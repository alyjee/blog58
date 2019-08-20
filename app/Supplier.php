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
        return $this->hasMany('\App\Hotel')->where('archive', 0);
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

    public static function getHotelsForSelect()
    {
        $data = [];
        $suppliers = Supplier::where('archive', 0)->get();
        foreach ($suppliers as $key => $supplier) {
            $hotels = $supplier->hotels()->get();
            $hotelsData = [];
            foreach ($hotels as $hKey => $hotel) {
                $hotelsData[$hotel->id] = $hotel->name;
            }
            $data[$supplier->name] = $hotelsData;
        }
        return $data;
    }
    
}
