<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'dashboard', 'as'=>'dashboard.'], function() {
	// All routes related to admin
    Route::get('/', ['as' =>'index', 'uses'=>'Admin\DashboardController@index']);
	
    Route::any('/settings', ['as' =>'settings', 'uses'=>'Admin\DashboardController@settings']);

	Route::get('/packages', ['as' =>'packages.index', 'uses'=>'Admin\PackageController@index']);
    Route::get('/packages/create', ['as' =>'packages.create', 'uses'=>'Admin\PackageController@create']);
    Route::post('/packages/store', ['as' =>'packages.store', 'uses'=>'Admin\PackageController@store']);
    Route::get('/packages/edit/{id}', ['as' =>'packages.edit', 'uses'=>'Admin\PackageController@edit']);
    Route::post('/packages/update/{id}', ['as' =>'packages.update', 'uses'=>'Admin\PackageController@update']);
    Route::get('/packages/archive/{id}', ['as' =>'packages.archive', 'uses'=>'Admin\PackageController@archive']);

    Route::get('/hotels', ['as' =>'hotels.index', 'uses'=>'Admin\HotelController@index']);
    Route::get('/hotels/create', ['as' =>'hotels.create', 'uses'=>'Admin\HotelController@create']);
    Route::post('/hotels/store', ['as' =>'hotels.store', 'uses'=>'Admin\HotelController@store']);
    Route::get('/hotels/edit/{id}', ['as' =>'hotels.edit', 'uses'=>'Admin\HotelController@edit']);
    Route::post('/hotels/update/{id}', ['as' =>'hotels.update', 'uses'=>'Admin\HotelController@update']);
    Route::get('/hotels/archive/{id}', ['as' =>'hotels.archive', 'uses'=>'Admin\HotelController@archive']);
    Route::get('/hotels/getHotelFeatures', ['as' =>'hotels.getHotelFeatures', 'uses'=>'Admin\HotelController@getHotelFeatures']);
    
    Route::get('/hotels/{hid}/pricing-period/create', ['as' =>'hotels.pricing_period.create', 'uses'=>'Admin\PricingPeriodController@create']);
    Route::post('/hotels/{hid}/pricing-period/store', ['as' =>'hotels.pricing_period.store', 'uses'=>'Admin\PricingPeriodController@store']);
    Route::get('/hotels/{hid}/pricing-period/edit/{id}', ['as' =>'hotels.pricing_period.edit', 'uses'=>'Admin\PricingPeriodController@edit']);
    Route::post('/hotels/{hid}/pricing-period/update/{id}', ['as' =>'hotels.pricing_period.update', 'uses'=>'Admin\PricingPeriodController@update']);
    Route::get('/hotels/{hid}/pricing-period/archive/{id}', ['as' =>'hotels.pricing_period.archive', 'uses'=>'Admin\PricingPeriodController@archive']);

    Route::get('/umrah/proposals', ['as' =>'umrah.index', 'uses'=>'Admin\UmrahController@index']);
    Route::get('/umrah/create', ['as' =>'umrah.create', 'uses'=>'Admin\UmrahController@create']);
    Route::post('/umrah/phase1/store', ['as' =>'umrah.phase1.store', 'uses'=>'Admin\UmrahController@storePhase1']);
    Route::get('/umrah/phase1/edit/{id}', ['as' =>'umrah.phase1.edit', 'uses'=>'Admin\UmrahController@editPhase1']);
    Route::get('/umrah/phase1/print/{id}', ['as' =>'umrah.phase1.print', 'uses'=>'Admin\UmrahController@printPhase1']);
    Route::post('/umrah/phase1/update/{id}', ['as' =>'umrah.phase1.update', 'uses'=>'Admin\UmrahController@updatePhase1']);
    Route::post('/umrah/phase1/archive/{id}', ['as' =>'umrah.phase1.archive', 'uses'=>'Admin\UmrahController@archivePhase1']);

    Route::get('/umrah/calculatePricing', ['as' =>'umrah.calculate_pricing', 'uses'=>'Admin\UmrahController@calculatePricing']);

    Route::get('/umrah/final/forms', ['as' =>'umrah.phase2.index', 'uses'=>'Admin\UmrahController@phase2Index']);
    Route::get('/umrah/phase2/{id}/create', ['as' =>'umrah.phase2.create', 'uses'=>'Admin\UmrahController@createPhase2']);
    Route::post('/umrah/phase2/{id}/store', ['as' =>'umrah.phase2.store', 'uses'=>'Admin\UmrahController@storePhase2']);


    // Route::get('/rooms', ['as' =>'rooms.index', 'uses'=>'Admin\RoomController@index']);
    // Route::get('/rooms/create', ['as' =>'rooms.create', 'uses'=>'Admin\RoomController@create']);
    // Route::post('/rooms/store', ['as' =>'rooms.store', 'uses'=>'Admin\RoomController@store']);
    // Route::get('/rooms/edit/{id}', ['as' =>'rooms.edit', 'uses'=>'Admin\RoomController@edit']);
    // Route::post('/rooms/update/{id}', ['as' =>'rooms.update', 'uses'=>'Admin\RoomController@update']);
    // Route::get('/rooms/archive/{id}', ['as' =>'rooms.archive', 'uses'=>'Admin\RoomController@archive']);
});