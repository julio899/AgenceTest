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

Route::get('/consultores', 'Consultores@getConsultores')->name('consultores');
Route::get('/consultores/graphi', 'Consultores@getGananciasGraphi')->name('consultoresgraphi');
Route::post('/consultores/{consultor}/ganancia', 'Consultores@getGanancias')->name('gananciasNetasConsultores');