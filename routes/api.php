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

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'api'], function()
{
	Route::get('send_sms', 'SendSmsController@send_sms');

});
Route::group(['namespace' => 'api'], function()
{
	Route::get('sms_balance', 'SendSmsController@sms_balance');

});
