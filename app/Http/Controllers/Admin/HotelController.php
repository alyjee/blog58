<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotel;
use App\Hotel;
use App\PricingPeriod;

class HotelController extends Controller
{
    //

    /**
     * Show Hotels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::getHotels();
        if($hotels->count() > 0){
            $hotels->map(function($hotel){
                $actions = '
                <a href="'.route('dashboard.hotels.edit', ['id' => $hotel->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
                </a>';

                $actions .= '
                <a href="'.route('dashboard.hotels.archive', ['id' => $hotel->id]).'" class="sa-warning">
                    <span class="label label-danger m-l-5"><i class="fa fa-trash"></i></span>
                </a>';

                $hotel['actions'] = $actions;
                return $hotel;
            });
        }

        return view('pages.hotel.main', ['hotels' => $hotels->toJson()]);
    }

    /**
     * Show Create Hotel Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Hotel::getHotelCategories();
        return view('pages.hotel.create', ['categories'=>$categories]);
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StoreHotel  $request
     * @param  \App\Services\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotel $request)
    {
        $hotel = Hotel::create($request->except('_token'));
        if($hotel->exists){
            return redirect()->route('dashboard.hotels.index');
        }
        return redirect()->back()->withErrors(['Failed to create new hotel'])->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Hotel::getHotelCategories();
            $hotel = Hotel::where('id', $id)->first();
            if($hotel)
                return view('pages.hotel.create', ['hotel' => $hotel, 'categories'=>$categories]);
            return redirect()->back()->withErrors(['Failed to find hotel'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Http\Requests\StoreHotel  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHotel $request, $id)
    {
        try {
            $inputs = $request->except('_token');
            $hotel = Hotel::where('id', $id)->update($inputs);
            if($hotel){
                return redirect()->route('dashboard.hotels.index');
            }
            return redirect()->back()->withErrors(['Failed to update hotel'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archive($id)
    {
        try {
            $hotel = Hotel::where('id', $id)->update(['archive'=>1]);
            if($hotel){
                return redirect()->route('dashboard.hotels.index');
            }
            return redirect()->back()->withErrors(['Failed to delete hotel.'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function getHotelFeatures(Request $request){
        try {
            $hotel_id = $request->get('hotel_id');
            $from_date = $request->get('from_date');
            $to_date = $request->get('to_date');
            $hotel = Hotel::where('id', $hotel_id)->first();
            if(!$hotel){
                return response()->json(['success'=>false, 'message'=>'Hotel not found.']);
            }
            $pp = PricingPeriod::getPricingPeriodByDates($hotel->id, $from_date, $to_date);

            if(!$pp){
                return response()->json(['success'=>false, 'message'=>'Pricings not found for given dates.']);
            }

            $data = ['pp'=>$pp];
            $data['hotel'] = $hotel;
            return response()->json(['success'=>true, 'message'=>'Pricing Feature Found Successfully.', 'data'=>$data]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
        
    }

}
