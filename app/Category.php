<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
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
        return $this->hasMany('\App\Hotel', 'category', 'id');
    }
    
    
}
