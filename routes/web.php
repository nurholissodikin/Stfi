<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'web'], function(){
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
	Route::resource('staff','StaffController');
	Route::resource('kategori','KategoriController');
	Route::resource('tempat','TempatController');
	Route::resource('barang','BarangController');
	Route::resource('barangmasuk','BarangMasukController');
	Route::resource('penempatanbarang','PenempatanBarangController');
	Route::resource('penyesuaianstok','PenyesuaianStokController');
  });
});
Route::get('settings/profile','SettingsController@profile');
Route::get('settings/profile/edit','SettingsController@editProfile');
Route::post('settings/profile','SettingsController@updateProfile');
Route::get('settings/password','SettingsController@editPassword');
Route::post('settings/password','SettingsController@updatePassword');
Route::get('a','SisaController@index');