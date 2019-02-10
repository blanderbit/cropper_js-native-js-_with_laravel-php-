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
Route::post('creatives/edit/{name}', 'CreativeController@update');
Route::post('creatives/', 'CreativeController@store');
Route::delete('creatives/destroy/{name}', 'CreativeController@destroy');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

