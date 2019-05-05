<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Request;

class StoreHotel extends FormRequest
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
                'category' => 'required|int',
                'name' => 'required|max:500',
                'room_basis' => 'required',
                'distance_from_haram' => 'required',
            ];
        }

        return [
            'category' => 'required|int',
            'name' => 'required|max:500',
            'room_basis' => 'required',
            'distance_from_haram' => 'required'
        ];
    }
}
