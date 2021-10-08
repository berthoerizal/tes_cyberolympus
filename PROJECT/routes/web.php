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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/customer', 'UserController@customer')->name('customer');
Route::get('/agent', 'UserController@agent')->name('agent');

Route::resource('/product', 'ProductController');
Route::resource('/order', 'OrderController');
Route::resource('/laporan', 'LaporanController');

Route::get('/cari_order', 'LaporanController@cari_order')->name('cari_order');
Route::get('/cari_customer', 'LaporanController@cari_customer')->name('cari_customer');
