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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
//Route Manual auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', 'HomeController@index')->name('admin');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin');
    Route::resource('/harian', 'HarianController');
    Route::resource('/bulanan', 'BulananController');
    Route::resource('/gaji', 'GajiController');
    Route::resource('/pemesanan', 'PemesananController');
    Route::resource('/event', 'EventController');
    Route::resource('/anggaran', 'AnggaranController');
    Route::resource('/produk', 'ProdukController');
    Route::resource('/saldo', 'SaldoController');
    Route::resource('/user', 'UserController');
    Route::resource('/karyawan', 'KaryawanController');
});
// Route::get('/harian', 'HarianController@index')->name('harian');
