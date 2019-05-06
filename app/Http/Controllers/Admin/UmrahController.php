<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhase1;
use App\Http\Requests\StorePhase2;
use App\Hotel;
use App\Package;
use App\UmrahForm;
use App\PersonalDetail;
use App\Setting;

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
                <a href="'.route('dashboard.umrah.phase1.print', ['id' => $form->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-print"></i></span>
                </a>';

                $actions .= '
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
        $packageSelect = Package::getPackagesForSelect();
        $flightTypeSelect = UmrahForm::getFlightTypes();
        $transportTypeSelect = UmrahForm::getTransportTypes();
        $packages = Package::getPackages();
        $featureclass = 'hide';

        return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'flightTypeSelect'=>$flightTypeSelect, 'packageSelect'=>$packageSelect, 'packages'=>$packages, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass]);
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StorePhase1  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhase1(StorePhase1 $request)
    {
        $inputs = $request->except('_token');
        $package = Package::getPackageById($inputs['package_category']);
        $per_person_psf = $package->price;
        $inputs['psf'] = $per_person_psf;
        $inputs['transport_charges'] = 0;
        if( $inputs['transport'] == 'private' ){
            $transport_price = Setting::getPrivateTransportPrice();
            $inputs['transport_charges'] = $transport_price;
        }
        $inputs['visa_charges'] = Setting::getVisaCharges();
        $umrahForm = UmrahForm::create($inputs);
        if($umrahForm->exists){
            return redirect()->route('dashboard.umrah.index');
        }
        return redirect()->back()->withErrors(['Failed to create new Umrah Proposal'])->withInput();
    }

    /**
     * Print the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printPhase1($id)
    {
        try {
            $hotels = Hotel::getHotels();
            $categoriesSelect = Hotel::getHotelCategories();
            $roomCategoriesSelect = Hotel::getHotelRoomCategories();

            $hotelSelect = Hotel::getHotelsForSelect();
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();


            $today_date = $proposedForm->created_at->format('d M Y');
            $form_ref_number = $proposedForm->ref_num;

            $transportTypeSelect = UmrahForm::getTransportTypes();

            $featureclass = '';

            return view('pages.umrah.print_phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'flightTypeSelect'=>$flightTypeSelect, 'packageSelect'=>$packageSelect, 'packages'=>$packages, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
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
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();

            $transportTypeSelect = UmrahForm::getTransportTypes();
            $featureclass = '';

            return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'flightTypeSelect'=>$flightTypeSelect, 'packageSelect'=>$packageSelect, 'packages'=>$packages, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Http\Requests\StorePhase1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePhase1(StorePhase1 $request, $id)
    {
        try {
            $inputs = $request->except('_token');

            $package = Package::getPackageById($inputs['package_category']);
            $per_person_psf = $package->price;
            $inputs['psf'] = $per_person_psf;
            $inputs['transport_charges'] = 0;
            if( $inputs['transport'] == 'private' ){
                $transport_price = Setting::getPrivateTransportPrice();
                $inputs['transport_charges'] = $transport_price;
            }
            $inputs['visa_charges'] = Setting::getVisaCharges();

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
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $personalDetails = PersonalDetail::where('form_id', $id)->get();

            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();

            $transportTypeSelect = UmrahForm::getTransportTypes();
            $featureclass = '';

            return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'personalDetails'=>$personalDetails, 'flightTypeSelect'=>$flightTypeSelect, 'packages'=>$packages, 'packageSelect'=>$packageSelect, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass]);
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
        return redirect()->route('dashboard.umrah.phase2.index');
    }

    /**
     * Store Hotel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculatePricing(Request $request)
    {
        try {
            $inputs = $request->except('_token');
            $data = self::calculatePricings($inputs);
            return response()->json(['success'=>true, 'message'=>'Calculations completed', 'data'=>$data]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }

    public static function calculatePricings($inputs){
        $makkah_hotel_pricing = 0;
        $madinah_hotel_pricing = 0;
        $transport_price = 0;
        $visa_price = 0;
        $umrah_per_person_price = 0;
        $total_umrah_price = 0;
        $umrah_price_per_person = 0;
        $total_tickets_price = 0;
        $total_package_price = 0;

        $total_package_price_pkr = 0;
        foreach ($inputs as $inputName => $inputValue) {

            if ( self::startsWith($inputName, 'makkah_') !== false && self::endsWith($inputName, '_price') !== false ) {
                $qtyInput = substr($inputName, 0, -6);
                $qtyInput .= '_qty';
                $priceInputVal = $inputValue;
                $qtyInputVal = $inputs[$qtyInput];
                $makkah_hotel_pricing += $priceInputVal * $qtyInputVal;
            } else if ( self::startsWith($inputName, 'madinah_') !== false && self::endsWith($inputName, '_price') !== false ) {
                $qtyInput = substr($inputName, 0, -6);
                $qtyInput .= '_qty';
                $priceInputVal = $inputValue;
                $qtyInputVal = $inputs[$qtyInput];
                $madinah_hotel_pricing += $priceInputVal * $qtyInputVal;
            } 
        }
        $makkah_hotel_pricing *= $inputs['makkah_hotel_nights'];
        $madinah_hotel_pricing *= $inputs['madinah_hotel_nights'];

        // add transport charges if any
        if( $inputs['transport'] == 'private' ) {
            $transport_price = Setting::getPrivateTransportPrice();
        }

        $visa_price = Setting::getVisaCharges();

        // add per person PSF
        $package = Package::getPackageById($inputs['package_category']);
        $per_person_psf = $package->price;
        $total_psf = $per_person_psf * $inputs['total_passengers'];

        $total_umrah_price = round($makkah_hotel_pricing + $madinah_hotel_pricing + $transport_price + $total_psf + $visa_price, 2);
        $umrah_price_per_person = round( $total_umrah_price / $inputs['total_passengers'], 2 );


        $total_tickets_price += $inputs['adult_ticket_price'] * $inputs['adults'];
        $total_tickets_price += $inputs['child_ticket_price'] * $inputs['childs'];
        $total_tickets_price += $inputs['infant_ticket_price'] * $inputs['infants'];
        $total_tickets_price = round($total_tickets_price, 2);

        $total_package_price = $total_umrah_price + $total_tickets_price;

        if( $inputs['conversion_rate'] ) {
            $total_package_price_pkr = $total_package_price * $inputs['conversion_rate'];
            $total_package_price_pkr = round($total_package_price_pkr, 2);
        }
        
        $data = [];
        $data['makkah_hotel_pricing'] = $makkah_hotel_pricing;
        $data['madinah_hotel_pricing'] = $madinah_hotel_pricing;
        $data['transport_price'] = $transport_price;
        $data['total_psf'] = $total_psf;
        $data['total_umrah_price'] = $total_umrah_price;
        $data['umrah_price_per_person'] = $umrah_price_per_person;
        $data['total_package_price'] = $total_package_price;
        $data['total_package_price_pkr'] = $total_package_price_pkr;
        return $data;
    }

    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
        return true;
    }

        return (substr($haystack, -$length) === $needle);
    }

}
