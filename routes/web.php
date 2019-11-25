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
Route::get('/prep', 'GuestHomeController@prep')->name('prep');
Route::get('/start', 'GuestHomeController@index')->name('start');
Route::get('/end', 'GuestHomeController@end')->name('end');

Route::post('/records_update', 'GuestHomeController@records_update')->name('records_update');
