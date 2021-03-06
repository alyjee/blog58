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
use App\PaymentDetail;
use App\Itinerary;
use App\FlightDetail;
use App\ItineraryFeature;

use Illuminate\Support\Carbon;
use DB;
use Config;
use PDF;

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
        $hotelSelect = \App\Supplier::getHotelsForSelect();
        
        $packageSelect = Package::getPackagesForSelect();
        $flightTypeSelect = UmrahForm::getFlightTypes();
        $flightStatusSelect = UmrahForm::getFlightStatuses();
        $transportTypeSelect = UmrahForm::getTransportTypes();
        $packages = Package::getPackages();
        $featureclass = 'hide';

        return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'flightTypeSelect'=>$flightTypeSelect, 'packageSelect'=>$packageSelect, 'packages'=>$packages, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass, 'flightStatusSelect'=>$flightStatusSelect]);
    }

    /**
     * Store Hotel.
     *
     * @param  \App\Http\Requests\StorePhase1  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhase1(StorePhase1 $request)
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
            } else if( $inputs['transport'] == 'sharing' ){
                $transport_price = Setting::getSharingTransportPrice();
                $inputs['transport_charges'] = $transport_price;
            }
            $inputs['visa_charges'] = Setting::getVisaCharges();
            
            $iternary_pricings = self::getIternaryPricings($inputs);

            $inputs['all_iternaries_total'] = $iternary_pricings['all_iternaries_total'];
            DB::beginTransaction();
            $umrahForm = UmrahForm::create($inputs);
            $iternary_pricings = self::getIternaryPricings($inputs, $umrahForm->id);
            $flight_details = self::getFlightDetails($inputs, $umrahForm->id);
            
            Itinerary::insert($iternary_pricings['iternaries']);

            foreach ($iternary_pricings['iternaries'] as $key => $iternaries) {
                $itinerary = Itinerary::where('form_id', $umrahForm->id)->where('iternary_from_date', $iternaries['iternary_from_date'])->where('iternary_to_date', $iternaries['iternary_to_date'])->first();
                $iternary_hotel_nights = $itinerary->iternary_hotel_nights;

                $iternary_from_date = $itinerary->iternary_from_date;
                $iternary_to_date = $itinerary->iternary_to_date;

                $weekends = self::getWeekendDays($iternary_from_date, $iternary_to_date);

                $data = self::getIternaryTotal($inputs, $iternary_from_date, $iternary_hotel_nights, $weekends, $itinerary->id);
                ItineraryFeature::insert($data['features']);
            }

            if( !empty($flight_details) ){
                FlightDetail::insert($flight_details);
            }

            if($umrahForm->exists){
                DB::commit();
                $data = [];
                $data['redirect_url'] = route('dashboard.umrah.index');
                $data['umrah_form'] = $umrahForm;
                return response()->json(['success'=> true, 'message'=>'Success! Umrah Proposal created successfull!', 'data'=>$data]);
            }
            return response()->json(['success'=>false, 'message'=>'Failed to create new Umrah Proposal!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
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

            $hotelSelect = \App\Supplier::getHotelsForSelect();
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $flightStatusSelect = UmrahForm::getFlightStatuses();
            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();


            $today_date = $proposedForm->created_at->format('d M Y');
            $form_ref_number = $proposedForm->ref_num;

            $transportTypeSelect = UmrahForm::getTransportTypes();

            $featureclass = '';

            $data = ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'flightTypeSelect'=>$flightTypeSelect, 'packageSelect'=>$packageSelect, 'packages'=>$packages, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass, 'flightStatusSelect'=>$flightStatusSelect];

            // return view('pages.umrah.print_phase1', $data);

            $viewsPath = Config::get('view.paths');
            $headerPath = $viewsPath[0].'/eadmin/partials/print/header.html';
            $footerPath = $viewsPath[0].'/eadmin/partials/print/footer.html';
            
            $pdf = \App::make('snappy.pdf.wrapper');
            $pdf->setOption('header-html', $headerPath);
            $pdf->setOption('footer-html', $footerPath);
            $pdf->setPaper('a4');
            $pdf->loadView('pages.umrah.print_phase1', $data);
            return $pdf->download('invoice.pdf');
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
            $hotelSelect = \App\Supplier::getHotelsForSelect();
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $flightStatusSelect = UmrahForm::getFlightStatuses();
            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();

            $transportTypeSelect = UmrahForm::getTransportTypes();
            $featureclass = '';

            return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'flightTypeSelect'=>$flightTypeSelect, 'packageSelect'=>$packageSelect, 'packages'=>$packages, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass, 'flightStatusSelect'=>$flightStatusSelect]);
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
        // try {
            $inputs = $request->except('_token');

            $package = Package::getPackageById($inputs['package_category']);
            $per_person_psf = $package->price;
            $inputs['psf'] = $per_person_psf;
            $inputs['transport_charges'] = 0;
            if( $inputs['transport'] == 'private' ){
                $transport_price = Setting::getPrivateTransportPrice();
                $inputs['transport_charges'] = $transport_price;
            } else if( $inputs['transport'] == 'sharing' ){
                $transport_price = Setting::getSharingTransportPrice();
                $inputs['transport_charges'] = $transport_price;
            }
            $inputs['visa_charges'] = Setting::getVisaCharges();
            DB::beginTransaction();
            $form_inputs = [];
            foreach ($inputs as $key => $value) {
                if( strpos($key, 'iternary_') !== false || $key == 'features' ){
                    continue;
                } else if ( in_array($key, FlightDetail::$all_fields) ) {
                    continue;
                } else {
                    $form_inputs[$key] = $value;
                }
            }

            $umrahForm = UmrahForm::where('id', $id)->update($form_inputs);
            $iternary_pricings = self::getIternaryPricings($inputs, $id);
            Itinerary::where('form_id', $id)->delete();
            Itinerary::insert($iternary_pricings['iternaries']);

            foreach ($iternary_pricings['iternaries'] as $key => $iternaries) {
                $itinerary = Itinerary::where('form_id', $id)->where('iternary_from_date', $iternaries['iternary_from_date'])->where('iternary_to_date', $iternaries['iternary_to_date'])->first();

                $iternary_hotel_nights = $itinerary->iternary_hotel_nights;

                $iternary_from_date = $itinerary->iternary_from_date;
                $iternary_to_date = $itinerary->iternary_to_date;

                $weekends = self::getWeekendDays($iternary_from_date, $iternary_to_date);

                $data = self::getIternaryTotal($inputs, $iternary_from_date, $iternary_hotel_nights, $weekends, $itinerary->id);
                ItineraryFeature::where('itinerary_id', $itinerary->itinerary_id)->delete();
                ItineraryFeature::insert($data['features']);
            }

            $flight_details = self::getFlightDetails($inputs, $id);
            if( !empty($flight_details) ){
                FlightDetail::where('form_id', $id)->delete();
                FlightDetail::insert($flight_details);
            }

            if($umrahForm){
                DB::commit();
                return redirect()->route('dashboard.umrah.index');
            }
            DB::rollback();
            return redirect()->back()->withErrors(['Failed to update proposal'])->withInput();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->withErrors([$e->getMessage()])->withInput();
        // }
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
                <a href="'.route('dashboard.umrah.phase2.print', ['id' => $form->id]).'">
                    <span class="label label-info m-l-5"><i class="fa fa-print"></i></span>
                </a>';

                $actions .= '
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
            $hotelSelect = \App\Supplier::getHotelsForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $flightStatusSelect = UmrahForm::getFlightStatuses();
            $personalDetails = PersonalDetail::where('form_id', $id)->get();
            $paymentlDetails = PaymentDetail::where('form_id', $id)->get();

            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();

            $transportTypeSelect = UmrahForm::getTransportTypes();
            $featureclass = '';

            return view('pages.umrah.phase1', ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'personalDetails'=>$personalDetails, 'flightTypeSelect'=>$flightTypeSelect, 'packages'=>$packages, 'packageSelect'=>$packageSelect, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass, 'paymentlDetails'=>$paymentlDetails, 'flightStatusSelect'=>$flightStatusSelect]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Show the form for phase2 progress.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printPhase2($id)
    {
        try {
            $hotels = Hotel::getHotels();
            $categoriesSelect = Hotel::getHotelCategories();
            $roomCategoriesSelect = Hotel::getHotelRoomCategories();
            $today_date = Carbon::today()->format('d M Y');
            $form_ref_number = UmrahForm::getRefNum();
            $hotelSelect = \App\Supplier::getHotelsForSelect();
            $proposedForm = UmrahForm::where('id', $id)->first();
            $flightTypeSelect = UmrahForm::getFlightTypes();
            $flightStatusSelect = UmrahForm::getFlightStatuses();
            $personalDetails = PersonalDetail::where('form_id', $id)->get();
            $paymentlDetails = PaymentDetail::where('form_id', $id)->get();

            $packages = Package::getPackages();
            $packageSelect = Package::getPackagesForSelect();

            $transportTypeSelect = UmrahForm::getTransportTypes();
            $featureclass = '';

            $data = ['categoriesSelect'=>$categoriesSelect, 'roomCategoriesSelect'=>$roomCategoriesSelect, 'form_creation_date' => $today_date, 'form_ref_number'=>$form_ref_number, 'hotelSelect'=>$hotelSelect, 'hotels'=>$hotels, 'proposedForm'=>$proposedForm, 'personalDetails'=>$personalDetails, 'flightTypeSelect'=>$flightTypeSelect, 'packages'=>$packages, 'packageSelect'=>$packageSelect, 'transportTypeSelect'=>$transportTypeSelect, 'featureclass'=>$featureclass, 'paymentlDetails'=>$paymentlDetails, 'flightStatusSelect'=>$flightStatusSelect];

            $viewsPath = Config::get('view.paths');
            $headerPath = $viewsPath[0].'/eadmin/partials/print/header.html';
            $footerPath = $viewsPath[0].'/eadmin/partials/print/footer.html';
            
            $pdf = \App::make('snappy.pdf.wrapper');
            $pdf->setOption('header-html', $headerPath);
            $pdf->setOption('footer-html', $footerPath);
            $pdf->setPaper('a4');
            $pdf->loadView('pages.umrah.print_phase1', $data);
            return $pdf->download('invoice.pdf');
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
        try {
            DB::beginTransaction();
            $inputs = $request->except('_token');
            $persons = $request->get('persons');
            foreach ($persons as $key => $person) {
                $persons[$key]['docs'] = (isset($person['docs'])) ? json_encode($person['docs']) : json_encode([]);
                $persons[$key]['form_id'] = $id;
                $persons[$key]['created_at'] = Carbon::now();
                $persons[$key]['updated_at'] = Carbon::now();
            }
            PersonalDetail::where('form_id', $id)->delete();
            PersonalDetail::insert($persons);

            $payment_detail_data = [];
            foreach ($inputs['received_amount'] as $key => $received_amount) {
                if(empty($received_amount))
                    continue;
                $payment_detail_data[$key]['form_id'] = $id;
                $payment_detail_data[$key]['received_amount'] = $received_amount;
                $payment_detail_data[$key]['receiving_date'] = $inputs['receiving_date'][$key];
                $payment_detail_data[$key]['created_at'] = Carbon::now();
                $payment_detail_data[$key]['updated_at'] = Carbon::now();
            }

            if( !empty($payment_detail_data) ) {
                PaymentDetail::where('form_id', $id)->delete();
                PaymentDetail::insert($payment_detail_data);
            }

            $umrahForm = UmrahForm::where('id', $id)->update(['stage'=>'final']);
            DB::commit();

            $data = [];
            $data['redirect_url'] = route('dashboard.umrah.phase2.index');
            $data['umrah_form'] = $umrahForm;
            return response()->json(['success'=> true, 'message'=>'Success! Umrah Proposal saved successfully!', 'data'=>$data]);
            return response()->json(['success'=>true, 'message'=>'Success! Umrah Proposal saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }

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
        $transport_price = 0;
        $visa_price = 0;
        $umrah_per_person_price = 0;
        $total_umrah_price = 0;
        $umrah_price_per_person = 0;
        $total_tickets_price = 0;
        $total_package_price = 0;
        $total_package_price_pkr = 0;
        $all_iternaries_total = 0;

        foreach ($inputs['iternary_from_date'] as $key => $value) {
            $iternary_total = 0;
            $iternary_double_total = 0;
            $iternary_triple_total = 0;
            $iternary_quad_total = 0;
            $iternary_quint_total = 0;
            $iternary_sharing_total = 0;
            $iternary_weekend_price_total = 0;
            $iternary_haram_view_price_total = 0;
            $iternary_full_board_per_pax_per_day_total = 0;
            $iternary_four_nights_price_total = 0;
            $iternary_extra_bed_price_total = 0;
            
            $iternary_hotel_nights = $inputs['iternary_hotel_nights'][$key];

            $iternary_from_date = $inputs['iternary_from_date'][$key];
            $iternary_to_date = $inputs['iternary_to_date'][$key];

            $weekends = self::getWeekendDays($iternary_from_date, $iternary_to_date);

            $data = self::getIternaryTotal($inputs, $iternary_from_date, $iternary_hotel_nights, $weekends);

            $iternary_total = $data['iternary_total_price'];
            
            $all_iternaries_total += $iternary_total;

        }

        // add transport charges if any
        if( $inputs['transport'] == 'private' ) {
            $transport_price = Setting::getPrivateTransportPrice();
        }

        $visa_price = Setting::getVisaCharges();

        // add per person PSF
        $package = Package::getPackageById($inputs['package_category']);
        $per_person_psf = $package->price;
        $total_psf = $per_person_psf * $inputs['total_passengers'];

        $total_umrah_price = round($all_iternaries_total + $transport_price + $total_psf + $visa_price, 2);
        $umrah_price_per_person = round( $total_umrah_price / $inputs['total_passengers'], 2 );


        $total_tickets_price += $inputs['adult_ticket_price'] * $inputs['adults'];
        $total_tickets_price += $inputs['child_ticket_price'] * $inputs['childs'];
        $total_tickets_price += $inputs['infant_ticket_price'] * $inputs['infants'];
        $total_tickets_price = round($total_tickets_price, 2);

        $total_package_price = $total_umrah_price ;
        $umrah_price_per_person_pkr = '';

        if( $inputs['conversion_rate'] ) {
            $umrah_price_per_person_pkr = $umrah_price_per_person * $inputs['conversion_rate'];
            $umrah_price_per_person_pkr = round($umrah_price_per_person_pkr, 2);

            $total_package_price_pkr = $total_package_price * $inputs['conversion_rate'];
            $total_package_price_pkr = $total_package_price_pkr + $total_tickets_price;
            $total_tickets_price_in_sar = $total_tickets_price / $inputs['conversion_rate'];
            $total_package_price += $total_tickets_price_in_sar;
            $total_package_price = round($total_package_price, 2);
            $total_package_price_pkr = round($total_package_price_pkr, 2);
        }
        
        $data = [];
        $data['all_iternaries_total'] = $all_iternaries_total;
        $data['transport_price'] = $transport_price;
        $data['total_psf'] = $total_psf;
        $data['total_umrah_price'] = $total_umrah_price;
        $data['umrah_price_per_person'] = $umrah_price_per_person;
        $data['umrah_price_per_person_pkr'] = $umrah_price_per_person_pkr;
        $data['total_package_price'] = $total_package_price;
        $data['total_package_price_pkr'] = $total_package_price_pkr;
        return $data;
    }

    public static function getWeekendDays($from_date, $to_date){
        $weekendDays = 0;
        $startTimestamp = strtotime($from_date);
        $endTimestamp = strtotime($to_date);
        for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24)) {
            if (date("N", $i) == 5 || date("N", $i) == 6) $weekendDays = $weekendDays + 1;
        }
        return $weekendDays;
    }

    public static function getIternaryTotal($inputs, $from_date, $totalNights, $weekends, $itineraryId=0) {
        $features = [];
        $iternary_total_price = 0;
        $_from_date = str_replace('-', '', $from_date);
        $featureNames = $inputs['features'][$_from_date]['feature_name'];
        $weekdays = $totalNights - $weekends;

        foreach ($featureNames as $key => $fname) {
            $feature = [];
            if( !$inputs['features'][$_from_date]['feature_qty'][$key] )
                continue;
            $fQty = (int) $inputs['features'][$_from_date]['feature_qty'][$key];
            $fWeekDayPrice = $inputs['features'][$_from_date]['feature_weekday_price'][$key];
            $fWeekendsPrice = $inputs['features'][$_from_date]['feature_weekend_price'][$key];

            $weekdays_price = $fQty * $fWeekDayPrice * $weekdays;
            $weekends_price = $fQty * $fWeekendsPrice * $weekends;

            $feature['name'] = $inputs['features'][$_from_date]['feature_name'][$key];
            $feature['qty'] = $fQty;
            $feature['weekday_price'] = $fWeekDayPrice;
            $feature['weekend_price'] = $fWeekendsPrice;
            $feature['weekdays'] = $weekdays;
            $feature['weekends'] = $weekends;
            $feature['itinerary_id'] = $itineraryId;


            $features[] = $feature;

            $iternary_total_price += $weekdays_price + $weekends_price;
        }
        $data = [];
        $data['iternary_total_price'] = $iternary_total_price;
        $data['features'] = $features;
        return $data;
    }

    public static function getIternaryPricings($inputs, $formId=0)
    {
        $all_iternaries_total = 0;
        $iternaries = [];

        foreach ($inputs['iternary_from_date'] as $key => $value) {
            $iternary_total = 0;
            $iternary_double_total = 0;
            $iternary_triple_total = 0;
            $iternary_quad_total = 0;
            $iternary_quint_total = 0;
            $iternary_sharing_total = 0;
            $iternary_weekend_price_total = 0;
            $iternary_haram_view_price_total = 0;
            $iternary_full_board_per_pax_per_day_total = 0;
            $iternary_four_nights_price_total = 0;
            $iternary_extra_bed_price_total = 0;
            
            $iternary_hotel_nights = $inputs['iternary_hotel_nights'][$key];

            $iternary_from_date = $inputs['iternary_from_date'][$key];
            $iternary_to_date = $inputs['iternary_to_date'][$key];

            $weekends = self::getWeekendDays($iternary_from_date, $iternary_to_date);

            $data = self::getIternaryTotal($inputs, $iternary_from_date, $iternary_hotel_nights, $weekends);
            $iternary_total = $data['iternary_total_price'];
            

            $iternary_detail['iternary_total'] = $iternary_total;
            $iternary_detail['form_id'] = $formId;
            
            $iternary_detail['iternary_hotel'] = $inputs['iternary_hotel'][$key];
            $iternary_detail['iternary_hotel_category'] = $inputs['iternary_hotel_category'][$key];
            $iternary_detail['iternary_hotel_distance_from_haram'] = $inputs['iternary_hotel_distance_from_haram'][$key];
            $iternary_detail['iternary_hotel_meal_plan'] = $inputs['iternary_hotel_meal_plan'][$key];
            
            $iternary_detail['iternary_from_date'] = $inputs['iternary_from_date'][$key];
            $iternary_detail['iternary_to_date'] = $inputs['iternary_to_date'][$key];
            $iternary_detail['iternary_hotel_nights'] = $inputs['iternary_hotel_nights'][$key];
            $iternary_detail['iternary_city'] = $inputs['iternary_city'][$key];
            $iternary_detail['created_at'] = Carbon::now();
            $iternary_detail['updated_at'] = Carbon::now();

            $iternaries[] = $iternary_detail;

            $all_iternaries_total += $iternary_total;

        }

        $data = [];
        $data['iternaries'] = $iternaries;
        $data['all_iternaries_total'] = round($all_iternaries_total, 2);
        return $data;
    }

    public static function getFlightDetails($inputs, $formId)
    {
        $data = [];
        foreach ($inputs['date'] as $key => $date) {
            if( empty($date) ) {
                continue;
            }
            $flight_detail = [];
            $flight_detail['form_id'] = $formId;
            $flight_detail['day'] = $inputs['day'][$key];
            $flight_detail['date'] = $inputs['date'][$key];
            $flight_detail['flight_status'] = $inputs['flight_status'][$key];
            $flight_detail['city_terminal_stopover'] = $inputs['city_terminal_stopover'][$key];
            $flight_detail['time'] = $inputs['time'][$key];
            $flight_detail['flight_class_status'] = $inputs['flight_class_status'][$key];
            $flight_detail['stop_eqp_flts'] = $inputs['stop_eqp_flts'][$key];
            $flight_detail['created_at'] = Carbon::now();
            $flight_detail['updated_at'] = Carbon::now();

            $data[] = $flight_detail;
        }
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
