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
        $from_date = $this->get('from_date');
        $daystosum = $this->get('total_days', 0);
        $expected_to_date = date('d-m-Y', strtotime($from_date.' + '.$daystosum.' days'));
        $to_date_rule = 'required|date|date_equals:'.$expected_to_date;

        $total_persons =($this->get('adults', 0)+$this->get('childs', 0)+$this->get('infants', 0));
        $total_passengers_rule = 'required|int|min:'.$total_persons;

        if(strpos(Request::path(), 'update')!==false){
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

                'iternary_from_date.*' => 'required|date',
                'iternary_to_date.*' => 'required|date',
                'iternary_hotel_nights.*' => 'required|int',
                'iternary_hotel.*' => 'required',
                'iternary_hotel_category.*' => 'required',
                // 'iternary_hotel_meal_plan.*' => 'required',

                'day.*' => 'required_with:airline',
                'date.*' => 'required_with:airline',
                'flight_status.*' => 'required_with:airline',
                'city_terminal_stopover.*' => 'required_with:airline',
                'time.*' => 'required_with:airline',
                'flight_class_status.*' => 'required_with:airline',
                'stop_eqp_flts.*' => 'required_with:airline',

                'umrah_per_person' => 'required',
                'adult_ticket_price' => 'required',
                'child_ticket_price' => 'required',
                'infant_ticket_price' => 'required',
                'total_umrah_price' => 'required',
                'total_ticket_price' => 'required',
                'total_package_price' => 'required',
                'transport' => 'required',
                'conversion_rate' => 'required',
                'total_package_price_pkr' => 'required',
                'persons.*.given_name' => 'required',
                'persons.*.dob' => 'required|date',
                'persons.*.passport_num' => 'required',
                'persons.*.passport_issue_date' => 'required|date',
                'persons.*.passport_expiry_date' => 'required|date'
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

            'iternary_from_date.*' => 'required|date',
            'iternary_to_date.*' => 'required|date',
            'iternary_hotel_nights.*' => 'required|int',
            'iternary_hotel.*' => 'required',
            'iternary_hotel_category.*' => 'required',
            // 'iternary_hotel_meal_plan.*' => 'required',

            'day.*' => 'required_with:airline',
            'date.*' => 'required_with:airline',
            'flight_status.*' => 'required_with:airline',
            'city_terminal_stopover.*' => 'required_with:airline',
            'time.*' => 'required_with:airline',
            'flight_class_status.*' => 'required_with:airline',
            'stop_eqp_flts.*' => 'required_with:airline',

            'umrah_per_person' => 'required',
            'adult_ticket_price' => 'required',
            'child_ticket_price' => 'required',
            'infant_ticket_price' => 'required',
            'total_umrah_price' => 'required',
            'total_ticket_price' => 'required',
            'total_package_price' => 'required',
            'transport' => 'required',
            'conversion_rate' => 'required',
            'total_package_price_pkr' => 'required',
            'persons.*.given_name' => 'required',
            'persons.*.dob' => 'required|date',
            'persons.*.passport_num' => 'required',
            'persons.*.passport_issue_date' => 'required|date',
            'persons.*.passport_expiry_date' => 'required|date'
        ];
    }
}
