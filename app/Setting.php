<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Setting extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'visa_charges', 'private_transport_charges', 'archive', 'created_at', 'updated_at'];

    /*
    *
    * Database Relations
    */
}
