<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhase1;
use App\Http\Requests\StorePhase2;
use App\Hotel;
use App\UmrahForm;
use App\PersonalDetail;

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
                <a href="'.route('dashboard.umrah.phase1.edit', ['id' => $form->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
                </a>';

                $actions .= '
                <a href="'.route('dashboard.umrah.phase1.archive', ['id' => $form->id]).'" class="sa-warning">
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPhase1($id)
    {
        try {
            $hotels = Hotel::getHotels();
            $categoriesSelect = Hotel::getHotelCategories();
            $roomCategoriesSelect = Hotel::getHotelRoomCategories();
            $today_date = Carbon::today()->format('d M Y');
            $form_ref_number = UmrahForm::getRefNum();
            $hotelSelect = Hotel::getHotelsForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();
            return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *proposedForm
     * @param  \App\Http\Requests\StorePhase1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePhase1(StorePhase1 $request, $id)
    {
        try {
            $inputs = $request->except('_token');
            $hotel = UmrahForm::where('id', $id)->update($inputs);
            if($hotel){
                return redirect()->route('dashboard.umrah.index');
            }
            return redirect()->back()->withErrors(['Failed to update proposal'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archivePhase1($id)
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

    /**
     * Show Hotels.
     *
     * @return \Illuminate\Http\Response
     */
    public function phase2Index()
    {
        $forms = UmrahForm::getFinalForms();
        if($forms->count() > 0){
            $forms->map(function($form){
                $actions = '
                <a href="'.route('dashboard.umrah.phase2.create', ['id' => $form->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-eye"></i></span>
                </a>';

                $actions .= '
                <a href="'.route('dashboard.umrah.phase1.archive', ['id' => $form->id]).'" class="sa-warning">
                    <span class="label label-danger m-l-5"><i class="fa fa-trash"></i></span>
                </a>';

                $form['actions'] = $actions;
                return $form;
            });
        }

        return view('pages.umrah.proposed_main', ['proposedForms' => $forms->toJson()]);
    }

    /**
     * Show the form for phase2 progress.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createPhase2($id)
    {
        try {
            $hotels = Hotel::getHotels();
            $categoriesSelect = Hotel::getHotelCategories();
            $roomCategoriesSelect = Hotel::getHotelRoomCategories();
            $today_date = Carbon::today()->format('d M Y');
            $form_ref_number = UmrahForm::getRefNum();
            $hotelSelect = Hotel::getHotelsForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();
            $personalDetails = PersonalDetail::where('form_id', $id)->get();

            return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'personalDetails'=>$personalDetails]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StorePhase2  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhase2(StorePhase2 $request, $id)
    {
        $persons = $request->get('persons');
        foreach ($persons as $key => $person) {
            $persons[$key]['docs'] = (isset($person['docs'])) ? json_encode($person['docs']) : json_encode([]);
            $persons[$key]['form_id'] = $id;
            $persons[$key]['created_at'] = Carbon::now();
            $persons[$key]['updated_at'] = Carbon::now();
        }
        PersonalDetail::where('form_id', $id)->delete();
        PersonalDetail::insert($persons);
        UmrahForm::where('id', $id)->update(['stage'=>'final']);
        return redirect()->route('dashboard.umrah.index');
    }

}
