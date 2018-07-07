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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('pemandus', 'PemanduController');

Route::resource('bahasas', 'BahasaController');

Route::resource('destinasis', 'DestinasiController');

Route::resource('wisatawans', 'WisatawanController');

Route::resource('pemanduBs', 'PemanduBController');

Route::resource('bahasaPemandus', 'BahasaPemanduController');

Route::resource('destinasiPemandus', 'DestinasiPemanduController');

Route::resource('histories', 'HistoryController');

Route::resource('beritas', 'BeritaController');