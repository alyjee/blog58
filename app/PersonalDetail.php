<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PersonalDetail extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['id', 'form_id', 'sur_name', 'given_name', 'middle_name', 'dob', 'passport_num', 'passport_issue_date', 'passport_expiry_date', 'docs', 'archive', 'created_at', 'updated_at'];

    public static $categories = [];

    /*
    *
    * Database Relations
    */
    
}
