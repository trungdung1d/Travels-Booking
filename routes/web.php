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
*/
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

/* Route::get('/contact',function (){
    return view('Page_Views.ContactPage');
}); */
Route::get('/contact','App\Http\Controllers\HomeController@contact');

Route::group(['middleware'=>['web']],function (){
    Route::get('language/{language}','App\Http\Controllers\LanguageController@index')->name('language');});
