<?php

use Illuminate\Support\Facades\Route;
//
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

/*Destination*/
Route::get('/add-destination','App\Http\Controllers\DestinationController@index');
Route::post('/save-destination','App\Http\Controllers\DestinationController@add');
Route::get('/list-destination','App\Http\Controllers\DestinationController@show_list');
Route::get('/edit-destination/{destination_id}','App\Http\Controllers\DestinationController@edit');
Route::post('/update-destination/{destination_id}','App\Http\Controllers\DestinationController@update');
Route::get('/delete-destination/{destination_id}','App\Http\Controllers\DestinationController@delete');
Route::get('/enable-destination/{destination_id}','App\Http\Controllers\DestinationController@enable');
Route::get('/disable-destination/{destination_id}','App\Http\Controllers\DestinationController@disable');
/*.........................................................................................................................*/
/*Booking*/
Route::get('/list-booking/{status}','App\Http\Controllers\BookingController@show_list');
Route::get('/details-booking/{booking_id}','App\Http\Controllers\BookingController@detail');
Route::post('/update-booking','App\Http\Controllers\BookingController@update');
/*.........................................................................................................................*/
/*Staff*/
Route::get('/add-staff','App\Http\Controllers\StaffController@add_staff');
Route::post('/save-staff','App\Http\Controllers\StaffController@save_staff');
Route::get('/list-staff/{position_id}','App\Http\Controllers\StaffController@show_list');
Route::get('/edit-staff/{staff_id}','App\Http\Controllers\StaffController@edit_staff');
Route::post('/update-staff/{staff_id}','App\Http\Controllers\StaffController@update_staff');
Route::get('delete-staff/{staff_id}','App\Http\Controllers\StaffController@delete_staff');
/*.........................................................................................................................*/
/*Contracts*/
Route::get('/new-contract','App\Http\Controllers\ContractController@new_contract');
Route::post('/add-contract','App\Http\Controllers\ContractController@add_contract');
Route::post('/save-contract','App\Http\Controllers\ContractController@save_contract');
Route::get('/list-contract/{contract_status}','App\Http\Controllers\ContractController@list_contract');
Route::get('/detail-contract/{contract_id}','App\Http\Controllers\ContractController@detail_contract');
Route::post('/update-contract','App\Http\Controllers\ContractController@update');
/*.........................................................................................................................*/
/*Type tour*/
Route::get('/add-type-tour','App\Http\Controllers\TypetourController@index');
Route::post('/save-type-tour','App\Http\Controllers\TypetourController@add');
Route::get('/list-type-tour','App\Http\Controllers\TypetourController@show_list');
Route::get('/edit-type-tour/{destination_id}','App\Http\Controllers\TypetourController@edit');
Route::post('/update-type-tour/{destination_id}','App\Http\Controllers\TypetourController@update');
Route::get('/delete-type-tour/{destination_id}','App\Http\Controllers\TypetourController@delete');
Route::get('/enable-type-tour/{destination_id}','App\Http\Controllers\TypetourController@enable');
Route::get('/disable-type-tour/{destination_id}','App\Http\Controllers\TypetourController@disable');
/*.........................................................................................................................*/
/*Tour*/
Route::get('/add-tour','App\Http\Controllers\TourController@index');
Route::post('/save-tour','App\Http\Controllers\TourController@add');
Route::get('/list-tour','App\Http\Controllers\TourController@show_list');
Route::get('delete-tour/{id_tour}','App\Http\Controllers\TourController@delete');
Route::get('edit-tour/{tour_id}','App\Http\Controllers\TourController@edit');
Route::post('update-tour/{tour_id}','App\Http\Controllers\TourController@update');
/*.........................................................................................................................*/

/*Login customer*/
Route::get('/login-index','App\Http\Controllers\CustomerController@login_index');
Route::post('/login-customer','App\Http\Controllers\CustomerController@login_customer');
Route::get('register-index','App\Http\Controllers\CustomerController@register_index');
Route::post('add-customer','App\Http\Controllers\CustomerController@add_customer');
Route::get('profile','App\Http\Controllers\CustomerController@profile')->name('profile');
Route::post('/update-profile/{customer_id}','App\Http\Controllers\CustomerController@update_profile');
Route::get('order/{customer_id}','App\Http\Controllers\CustomerController@order');
Route::get('logout-customer','App\Http\Controllers\CustomerController@logout');
/*Login admin*/
Route::post('login-admin','App\Http\Controllers\LoginController@login');
Route::get('admin','App\Http\Controllers\LoginController@index');
Route::get('logout','App\Http\Controllers\LoginController@logout');


/* Route::get('/contact',function (){
    return view('Page_Views.ContactPage');
}); */
Route::get('/contact','App\Http\Controllers\HomeController@contact');

Route::group(['middleware'=>['web']],function (){
    Route::get('language/{language}','App\Http\Controllers\LanguageController@index')->name('language');});

