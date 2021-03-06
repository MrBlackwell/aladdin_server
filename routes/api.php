<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(["prefix" => "auth", "namespace" => "Mobile"], function () {
    Route::post('/register', 'AuthorizationController@register');
    Route::post('/confirm_sms', 'AuthorizationController@confirm');
    Route::post('/login', 'AuthorizationController@login');
    Route::post('/confirm_token', 'AuthorizationController@token');
    Route::post('/change_number', 'AuthorizationController@change');
    Route::post('/set_number', 'AuthorizationController@set');
});

Route::group(["prefix" => "verify", "namespace" => "Mobile\Master"], function (){
   Route::get('/categories', 'VerifyController@getCategory');
   Route::post('/categories', 'VerifyController@setCategory')->middleware('master_auth_api');
   Route::get('/test', 'VerifyController@getTest');
   Route::post('/test', 'VerifyController@setTest')->middleware('master_auth_api');
   Route::post('/upload_photo', 'VerifyController@uploadPhoto')->middleware('master_auth_api');
   Route::post('/main_info', 'VerifyController@setMainInfo')->middleware('master_auth_api');
   Route::get('/subway_info', 'VerifyController@getSubway');
   Route::post('/subway_info', 'VerifyController@subwayInfo')->middleware('master_auth_api');
   Route::post('/about_price_sale', 'VerifyController@aboutPriceSale')->middleware('master_auth_api');
   Route::post('call_time', 'VerifyController@callTime')->middleware('master_auth_api');

   /*Route::post('/verify_update', 'VerifyController@verify_update')->middleware('master_auth_api');
   Route::post('/save_info', 'VerifyController@saveInfo')->middleware('master_auth_api');*/
});
