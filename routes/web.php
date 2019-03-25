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

	Route::get('/hotels', ['as' =>'hotels.index', 'uses'=>'Admin\HotelController@index']);
    Route::get('/hotels/create', ['as' =>'hotels.create', 'uses'=>'Admin\HotelController@create']);
    Route::post('/hotels/store', ['as' =>'hotels.store', 'uses'=>'Admin\HotelController@store']);
    Route::get('/hotels/edit/{id}', ['as' =>'hotels.edit', 'uses'=>'Admin\HotelController@edit']);
    Route::post('/hotels/update/{id}', ['as' =>'hotels.update', 'uses'=>'Admin\HotelController@update']);
    Route::get('/hotels/archive/{id}', ['as' =>'hotels.archive', 'uses'=>'Admin\HotelController@archive']);

    Route::get('/umrah/proposals', ['as' =>'umrah.index', 'uses'=>'Admin\UmrahController@index']);
    Route::get('/umrah/create', ['as' =>'umrah.create', 'uses'=>'Admin\UmrahController@create']);
    Route::post('/umrah/phase1/store', ['as' =>'umrah.phase1.store', 'uses'=>'Admin\UmrahController@storePhase1']);
    Route::get('/umrah/phase1/edit/{id}', ['as' =>'umrah.phase1.edit', 'uses'=>'Admin\UmrahController@create']);
    Route::post('/umrah/phase1/update', ['as' =>'umrah.phase1.update', 'uses'=>'Admin\UmrahController@create']);

    Route::post('/umrah/store', ['as' =>'umrah.store', 'uses'=>'Admin\UmrahController@store']);
    Route::get('/umrah/edit/{id}', ['as' =>'umrah.edit', 'uses'=>'Admin\UmrahController@edit']);
    Route::post('/umrah/update/{id}', ['as' =>'umrah.update', 'uses'=>'Admin\UmrahController@update']);
    Route::get('/umrah/archive/{id}', ['as' =>'umrah.archive', 'uses'=>'Admin\UmrahController@archive']);

    // Route::get('/rooms', ['as' =>'rooms.index', 'uses'=>'Admin\RoomController@index']);
    // Route::get('/rooms/create', ['as' =>'rooms.create', 'uses'=>'Admin\RoomController@create']);
    // Route::post('/rooms/store', ['as' =>'rooms.store', 'uses'=>'Admin\RoomController@store']);
    // Route::get('/rooms/edit/{id}', ['as' =>'rooms.edit', 'uses'=>'Admin\RoomController@edit']);
    // Route::post('/rooms/update/{id}', ['as' =>'rooms.update', 'uses'=>'Admin\RoomController@update']);
    // Route::get('/rooms/archive/{id}', ['as' =>'rooms.archive', 'uses'=>'Admin\RoomController@archive']);
});