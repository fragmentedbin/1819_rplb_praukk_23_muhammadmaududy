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
Route::post('/inv_add', 'InventarisController@store')->name('inventaris');
Route::delete('/delete/{inv}', 'InventarisController@destroy');
Route::get('/show/{inv}', "InventarisController@show")->name('inventaris');
Route::get('/edit/{inv}', "InventarisController@edit")->name('inventaris');
Route::post('/inv_post/{inv}', "InventarisController@update");
Route::get('pinjaman', 'PinjamanController@index')->name('pinjaman');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
