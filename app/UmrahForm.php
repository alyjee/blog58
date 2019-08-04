<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UmrahForm extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'ref_num', 'person_name', 'total_passengers', 'total_days', 'from_date', 'to_date', 'adults', 'childs', 'infants', 'package_category', 'transport', 'archive', 'created_at', 'updated_at', 'stage', 'adult_ticket_price', 'child_ticket_price', 'infant_ticket_price', 'total_ticket_price', 'umrah_per_person', 'umrah_per_person_pkr', 'total_umrah_price', 'total_package_price', 'total_package_price_pkr', 'airline', 'flight_type', 'psf', 'transport_charges', 'visa_charges', 'all_iternaries_total', 'conversion_rate'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    public function package(){
        return $this->hasOne('App\Package', 'id', 'package_category');
    }

    public function itineraries(){
        return $this->hasMany('App\Itinerary', 'form_id', 'id');
    }

    public function flight_details(){
        return $this->hasMany('App\FlightDetail', 'form_id', 'id');
    }


    public static function getRefNum(){
        $num_str = sprintf("%06d", mt_rand(1, 999999));
        return 'SL'.$num_str;
    }

    public static function getProposedForms(){
        $query = UmrahForm::where('archive', 0)->where('stage', 'proposed');
        return $query->get();
    }

    public static function getFinalForms(){
        $query = UmrahForm::where('archive', 0)->where('stage', 'final');
        return $query->get();
    }

    public static function getFlightTypes(){
        $categories = [];
        $categories['direct'] = 'Direct';
        $categories['indirect'] = 'In Direct';
        return $categories;
    }

    public static function getFlightStatuses(){
        $data = [];
        $data['arr'] = 'ARR';
        $data['dep'] = 'DEP';
        return $data;
    }

    public static function getTransportTypes(){
        $categories = [];
        $categories['private'] = 'Private';
        $categories['sharing'] = 'Sharing';
        return $categories;
    }

    
}
