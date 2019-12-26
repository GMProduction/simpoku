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

Route::get('v1/dataEvent', 'api\eventController@dataEvent')->name('dataEvent');
Route::get('v1/eventIncoming', 'api\eventController@eventIncoming')->name('eventIncoming');
Route::get('v1/detailEvent/{id}', 'api\eventController@detailEvent')->name('detailEvent');
