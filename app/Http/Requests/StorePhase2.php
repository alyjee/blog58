<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Request;

class StorePhase2 extends FormRequest
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
                'ref_num' => 'required',
                'person_name' => 'required|max:500',
                'total_days' => 'required|int',
                'from_date' => 'required',
                'to_date' => 'required',
                'total_passengers' => 'required',
                'adults' => 'required|int',
                'childs' => 'required|int',
                'infants' => 'required|int',
                'package_category' => 'required',
                'room_category' => 'required',
                'makkah_hotel_nights' => 'required',
                'makkah_hotel' => 'required',
                'makkah_hotel_category' => 'required',
                'makkah_hotel_meal_plan' => 'required',
                'makkah_hotel_room_price' => 'required',
                'madinah_hotel_nights' => 'required',
                'madinah_hotel' => 'required',
                'madinah_hotel_category' => 'required',
                'madinah_hotel_meal_plan' => 'required',
                'madinah_hotel_room_price' => 'required',
                'umrah_per_person' => 'required',
                'adult_ticket_price' => 'required',
                'child_ticket_price' => 'required',
                'infant_ticket_price' => 'required',
                'total_umrah_price' => 'required',
                'total_ticket_price' => 'required',
                'total_package_price' => 'required',
                'persons.*.surname' => 'required'
            ];
        }

        return [
            'ref_num' => 'required',
            'person_name' => 'required|max:500',
            'total_days' => 'required|int',
            'from_date' => 'required',
            'to_date' => 'required',
            'total_passengers' => 'required',
            'adults' => 'required|int',
            'childs' => 'required|int',
            'infants' => 'required|int',
            'package_category' => 'required',
            'room_category' => 'required',
            'makkah_hotel_nights' => 'required',
            'makkah_hotel' => 'required',
            'makkah_hotel_category' => 'required',
            'makkah_hotel_meal_plan' => 'required',
            'makkah_hotel_room_price' => 'required',
            'madinah_hotel_nights' => 'required',
            'madinah_hotel' => 'required',
            'madinah_hotel_category' => 'required',
            'madinah_hotel_meal_plan' => 'required',
            'madinah_hotel_room_price' => 'required',
            'umrah_per_person' => 'required',
            'adult_ticket_price' => 'required',
            'child_ticket_price' => 'required',
            'infant_ticket_price' => 'required',
            'total_umrah_price' => 'required',
            'total_ticket_price' => 'required',
            'total_package_price' => 'required',
            'persons.*.given_name' => 'required',
            'persons.*.dob' => 'required|date',
            'persons.*.passport_num' => 'required',
            'persons.*.passport_issue_date' => 'required|date',
            'persons.*.passport_expiry_date' => 'required|date'
        ];
    }
}
