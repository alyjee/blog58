<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhase1;
use App\Hotel;
use App\UmrahForm;

use Illuminate\Support\Carbon;

class UmrahController extends Controller
{
    //

    /**
     * Show Hotels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = UmrahForm::getProposedForms();
        if($forms->count() > 0){
            $forms->map(function($form){
                $actions = '
                <a href="'.route('dashboard.hotels.edit', ['id' => $form->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
                </a>';

                $actions .= '
                <a href="'.route('dashboard.hotels.archive', ['id' => $form->id]).'" class="sa-warning">
                    <span class="label label-danger m-l-5"><i class="fa fa-trash"></i></span>
                </a>';

                $form['actions'] = $actions;
                return $form;
            });
        }

        return view('pages.umrah.proposed_main', ['proposedForms' => $forms->toJson()]);
    }

    /**
     * Show Create Hotel Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::getHotels();
        $categoriesSelect = Hotel::getHotelCategories();
        $roomCategoriesSelect = Hotel::getHotelRoomCategories();
        $today_date = Carbon::today()->format('d M Y');
        $form_ref_number = UmrahForm::getRefNum();
        $hotelSelect = Hotel::getHotelsForSelect();

        return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels]);
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StorePhase1  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhase1(StorePhase1 $request)
    {
        $umrahForm = UmrahForm::create($request->except('_token'));
        if($umrahForm->exists){
            return redirect()->route('dashboard.umrah.index');
        }
        return redirect()->back()->withErrors(['Failed to create new Umrah Proposal'])->withInput();
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
            return view('pages.hotel.create', ['hotel' => $hotel, 'categories'=>$categories]);
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

}
