<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/karyawans', 'KaryawanController@index')->name('karyawans.index');

Route::get('/karyawans/create', 'KaryawanController@create')->name('karyawans.create');

Route::get('/karyawans/{karyawan}', 'KaryawanController@show')->name('karyawans.show');

Route::get('/karyawans/{karyawan}/edit', 'KaryawanController@edit')->name('karyawans.edit');

Route::patch('/karyawans/{karyawan}', 'KaryawanController@update')->name('karyawans.update');

Route::delete('/karyawans/{karyawan}', 'KaryawanController@destroy')->name('karyawans.destroy');

Route::post('/karyawans', 'KaryawanController@store')->name('karyawan.store');





Route::get('/jabatans', 'JabatanController@index')->name('jabatans.index');

Route::get('/jabatans/create', 'JabatanController@create')->name('jabatans.create');

Route::get('/jabatans/{jabatan}', 'JabatanController@show')->name('jabatans.show');

Route::get('/jabatans/{jabatan}/edit', 'JabatanController@edit')->name('jabatans.edit');

Route::patch('/jabatans/{jabatan}', 'JabatanController@update')->name('jabatans.update');

Route::delete('/jabatans/{jabatan}', 'JabatanController@destroy')->name('jabatans.destroy');

Route::post('/jabatans', 'JabatanController@store')->name('jabatan.store');




Route::get('/statuses', 'StatusController@index')->name('statuses.index');

Route::get('/statuses/create', 'StatusController@create')->name('statuses.create');

Route::get('/statuses/{status}', 'StatusController@show')->name('statuses.show');

Route::get('/statuses/{status}/edit', 'StatusController@edit')->name('statuses.edit');

Route::patch('/statuses/{status}', 'StatusController@update')->name('statuses.update');

Route::delete('/statuses/{status}', 'StatusController@destroy')->name('statuses.destroy');

Route::post('/statuses', 'StatusController@store')->name('status.store');




Route::get('/pendidikans', 'PendidikanController@index')->name('pendidikans.index');

Route::get('/pendidikans/create', 'PendidikanController@create')->name('pendidikans.create');

Route::get('/pendidikans/{pendidikan}', 'PendidikanController@show')->name('pendidikans.show');

Route::get('/pendidikans/{pendidikan}/edit', 'PendidikanController@edit')->name('pendidikans.edit');

Route::patch('/pendidikans/{pendidikan}', 'PendidikanController@update')->name('pendidikans.update');

Route::delete('/pendidikans/{pendidikan}', 'PendidikanController@destroy')->name('pendidikans.destroy');

Route::post('/pendidikans', 'PendidikanController@store')->name('pendidikan.store');