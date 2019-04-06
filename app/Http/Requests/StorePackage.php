<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Request;

class StorePackage extends FormRequest
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
                'name' => 'required|max:255',
                'price' => 'required'
            ];
        }

        return [
            'name' => 'required|max:255',
            'price' => 'required'
        ];
    }
}
