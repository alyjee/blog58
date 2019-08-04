<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Setting extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'visa_charges', 'sharing_transport_charges', 'private_transport_charges', 'archive', 'created_at', 'updated_at'];

    /*
    *
    * Database Relations
    */

    public static function getPrivateTransportPrice(){
    	return Setting::where('archive', 0)->first()->private_transport_charges;
    }

    public static function getSharingTransportPrice(){
        return Setting::where('archive', 0)->first()->sharing_transport_charges;
    }

    public static function getVisaCharges(){
        return Setting::where('archive', 0)->first()->visa_charges;
    }
}
