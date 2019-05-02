<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Request;

class StorePhase1 extends FormRequest
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
        $from_date = $this->get('from_date');
        $daystosum = $this->get('total_days', 0) - 1;
        $expected_to_date = date('d-m-Y', strtotime($from_date.' + '.$daystosum.' days'));
        $to_date_rule = 'required|date|date_equals:'.$expected_to_date;

        $total_persons =($this->get('adults', 0)+$this->get('childs', 0)+$this->get('infants', 0));
        $total_passengers_rule = 'required|int|min:'.$total_persons;

        if(strpos(Request::path(), 'update')!==false){
            return [
                'ref_num' => 'required',
                'person_name' => 'required|max:500',
                'total_days' => 'required|int',
                'from_date' => 'required',
                'to_date' => $to_date_rule,
                'total_passengers' => $total_passengers_rule,
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
                'transport' => 'required',
                'makkah_from_date' => 'required',
                'makkah_to_date' => 'required'
            ];
        }

        return [
            'ref_num' => 'required',
            'person_name' => 'required|max:500',
            'total_days' => 'required|int',
            'from_date' => 'required|date',
            'to_date' => $to_date_rule,
            'total_passengers' => $total_passengers_rule,
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
            'transport' => 'required',
            'makkah_from_date' => 'required',
            'makkah_to_date' => 'required'
        ];
    }
}
