<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotel;
use App\Hotel;

use App\Http\Requests\StorePricingPeriod;
use App\PricingPeriod;
use App\PricingFeature;
use Illuminate\Support\Carbon;

use DB;

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
                return view('pages.pricing_periods.create', ['hotel' => $hotel, 'pp' => new PricingPeriod]);
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

        $features = [];
        foreach ($inputs['feature']['name'] as $key => $featureName) {
            $feature = [];
            if( empty($inputs['feature']['name'][$key]) || empty($inputs['feature']['price'][$key]) ){
                continue;
            }
            $feature['name'] = $inputs['feature']['name'][$key];
            $feature['price'] = $inputs['feature']['price'][$key];
            $feature['weekend_price'] = (!empty($inputs['feature']['weekend_price'][$key])) ? $inputs['feature']['weekend_price'][$key] : $inputs['feature']['price'][$key];
            $features[] = $feature;
        }

        $features = self::makeFeatureData($inputs);
        
        if( empty($features) ) {
            return response()->json(['success'=>false, 'message'=>'At least one feature is required to add a pricing period!']);
        }

        unset($inputs['feature']);

        $inputs['hotel_id'] = $hid;

        DB::beginTransaction();

        $pp = PricingPeriod::create($inputs);

        if($pp->exists){
            foreach ($features as $key => $feature) {
                $features[$key]['pricing_period_id'] = $pp->id;
            }
            PricingFeature::where(['pricing_period_id' => $pp->id])->delete();
            PricingFeature::insert($features);
            DB::commit();
            $data = [];
            $data['redirect_url'] = route('dashboard.hotels.edit', ['id'=>$hid]);
            $data['pricing_period'] = $pp;
            return response()->json(['success'=> true, 'message'=>'Success! Pricing Period saved successfull!', 'data'=>$data]);
        }
        DB::rollBack();
        return response()->json(['success'=>false, 'message'=>'Failed to save pricing feature!']);
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

            $features = self::makeFeatureData($inputs);
            
            if( empty($features) ) {
                return response()->json(['success'=>false, 'message'=>'At least one feature is required to add a pricing period!']);
            }

            unset($inputs['feature']);

            DB::beginTransaction();

            $pp = PricingPeriod::where('id', $id)->update($inputs);

            foreach ($features as $key => $feature) {
                $features[$key]['pricing_period_id'] = $id;
            }
            PricingFeature::where(['pricing_period_id' => $id])->delete();
            PricingFeature::insert($features);

            if($pp){
                DB::commit();
                $data = [];
                $data['redirect_url'] = route('dashboard.hotels.edit', ['id'=>$hid]);
                $data['pricing_period'] = $pp;
                return response()->json(['success'=> true, 'message'=>'Success! Pricing Period saved successfull!', 'data'=>$data]);
            }
            DB::rollBack();
            return response()->json(['success'=> false, 'message'=>'Failed to save pricing features.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success'=> false, 'message'=>$e->getMessage()]);
        }
    }

    public static function makeFeatureData($inputs){
        $features = [];
        foreach ($inputs['feature']['name'] as $key => $featureName) {
            $feature = [];
            if( empty($inputs['feature']['name'][$key]) || empty($inputs['feature']['price'][$key]) ){
                continue;
            }
            $feature['name'] = $inputs['feature']['name'][$key];
            $feature['price'] = $inputs['feature']['price'][$key];
            $feature['weekend_price'] = (!empty($inputs['feature']['weekend_price'][$key])) ? $inputs['feature']['weekend_price'][$key] : $inputs['feature']['price'][$key];
            $features[] = $feature;
        }

        return $features;
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
