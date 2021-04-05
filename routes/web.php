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

// Route::get('/', function () {
//     return view('index');
// })->name("inventaris");
Route::get('/', 'InventarisController@index')->name('inventaris');
Route::get('inv_add', 'InventarisController@create')->name('inventaris');
Route::post('/inv_add', 'InventarisController@store');
Route::delete('/delete/{inv}', 'InventarisController@destroy');
Route::get('/show/{inv}', "InventarisController@show")->name('inventaris');
Route::get('/edit/{inv}', "InventarisController@edit")->name('inventaris');
Route::post('/inv_post/{inv}', "InventarisController@update");

Route::get('pinjaman', 'PinjamanController@index')->name('pinjaman');
Route::get('pnj_add', 'PinjamanController@create')->name('pinjaman');
Route::post('/pnj_add', 'PinjamanController@store');
Route::delete('/pnj_delete/{pnj_id}', 'PinjamanController@destroy');
Route::get('/pnj_show/{pnj_id}', 'PinjamanController@show')->name('pinjaman');
Route::get('/pnj_edit/{pnj_id}', 'PinjamanController@edit')->name('pinjaman');
Route::post('/pnj_post/{pnj_id}', 'PinjamanController@update');
Route::post('/pnj_approve/{pnj_id}', 'PinjamanController@approve');
Route::post('/pnj_return/{pnj_id}', 'PinjamanController@return');

Route::get('/ruangan', 'RuanganController@index')->name('ruangan');
Route::get('/rng_add', 'RuanganController@create')->name('ruangan');
Route::post('/rng_add', 'RuanganController@store');
Route::delete('/rng_delete/{rng_id}', 'RuanganController@destroy');
Route::get('/rng_edit/{rng_id}', 'RuanganController@edit')->name('ruangan');
Route::post('/rng_post/{rng_id}', 'RuanganController@update');

Route::get('/user_set', 'UserSettingController@index')->name('user_set')->middleware(['auth', 'password.confirm']);
Route::get('/usr_add', 'UserSettingController@create')->name('user_set');
Route::post('/usr_add', 'UserSettingController@store');
Route::delete('/user_delete/{user_id}', 'UserSettingController@destroy');

Route::get('/log', 'LogController@index')->name('log');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
