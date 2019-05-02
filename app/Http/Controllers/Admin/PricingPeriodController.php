<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotel;
use App\Hotel;

use App\Http\Requests\StorePricingPeriod;
use App\PricingPeriod;

class PricingPeriodController extends Controller
{
    //

    /**
     * Show Create Hotel Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hid)
    {
        try {
            $hotel = Hotel::where('id', $hid)->first();
            if($hotel){
                return view('pages.pricing_periods.create', ['hotel' => $hotel]);
            }
            return redirect()->back()->withErrors(['Failed to find hotel.'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StorePricingPeriod  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePricingPeriod $request, $hid)
    {
        $inputs = $request->except('_token');
        $inputs['hotel_id'] = $hid;
        $pp = PricingPeriod::create($inputs);
        if($pp->exists){
            return redirect()->route('dashboard.hotels.edit', ['id'=>$hid]);
        }
        return redirect()->back()->withErrors(['Failed to add new pricing period'])->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($hid, $id)
    {
        try {
            $hotel = Hotel::where('id', $hid)->first();
            $pp = PricingPeriod::where('id', $id)->first();
            return view('pages.pricing_periods.create', ['hotel' => $hotel, 'pp'=>$pp]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Http\Requests\StorePricingPeriod  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePricingPeriod $request, $hid, $id)
    {
        try {
            $inputs = $request->except('_token');
            $pp = PricingPeriod::where('id', $id)->update($inputs);
            if($pp){
                return redirect()->route('dashboard.hotels.edit', ['id'=>$hid]);
            }
            return redirect()->back()->withErrors(['Failed to update pricing period'])->withInput();
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
    public function archive($hid, $id)
    {
        try {
            $pp = PricingPeriod::where('id', $id)->update(['archive'=>1]);
            if($pp){
                return redirect()->route('dashboard.hotels.edit', ['id'=>$hid]);
            }
            return redirect()->back()->withErrors(['Failed to delete pricing period.'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

}
