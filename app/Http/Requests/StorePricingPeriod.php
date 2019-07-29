<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Request;

class StorePricingPeriod extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if( Auth::guard()->check() && Auth::guard()->user()->role=='admin' ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(strpos(Request::path(), 'update')!==false){
            return [
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date'
            ];
        }

        return [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date'
        ];
    }
}
