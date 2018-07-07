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


Route::resource('pemandus', 'PemanduAPIController');

Route::resource('bahasas', 'BahasaAPIController');

Route::resource('destinasis', 'DestinasiAPIController');

Route::resource('wisatawans', 'WisatawanAPIController');

Route::resource('pemandu_bs', 'PemanduBAPIController');

Route::resource('bahasa_pemandus', 'BahasaPemanduAPIController');

Route::resource('destinasi_pemandus', 'DestinasiPemanduAPIController');

Route::resource('histories', 'HistoryAPIController');

Route::resource('beritas', 'BeritaAPIController');