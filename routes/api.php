<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Event and Slider
Route::get('v1/dataEvent', 'api\eventController@dataEvent')->name('dataEvent');
Route::get('v1/eventIncoming', 'api\eventController@eventIncoming')->name('eventIncoming');
Route::get('v1/detailEvent/{id}', 'api\eventController@detailEvent')->name('detailEvent');

Route::get('v1/dataSlider', 'api\eventController@dataSlider')->name('dataSlider');
Route::get('v1/cekFavorite', 'api\eventController@cekFavorite')->name('cekFavorite');
Route::post('v1/insertFavorit', 'api\eventController@insertFavorit')->name('insertFavorit');
Route::post('v1/deleteFavorit', 'api\eventController@deleteFavorit')->name('deleteFavorit');
Route::get('v1/tampilFavorite/{idUser}', 'api\eventController@tampilFavorite')->name('tampilFavorite');
Route::get('v1/eventMonth/{month}', 'api\eventController@eventMonth')->name('eventMonth');
Route::get('v1/tampilSpec', 'api\eventController@tampilSpec')->name('tampilSpec');
Route::get('v1/eventSpec/{spec}', 'api\eventController@eventSpec')->name('eventSpec');

