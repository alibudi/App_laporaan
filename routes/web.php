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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/harian', 'HarianController@index')->name('harian');
Route::resource('/harian', 'HarianController');
Route::resource('/bulanan', 'BulananController');
Route::resource('/gaji', 'GajiController');
Route::resource('/pemesanan', 'PemesananController');