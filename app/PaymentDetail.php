<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PaymentDetail extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'form_id', 'received_amount', 'receiving_date', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    
}
