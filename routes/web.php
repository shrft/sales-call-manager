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

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/call-list', 'CallListController@index')->name('cl');
Route::get('/call-list/{id}', 'CallListController@detail')->name('cl.dtl');
Route::post('/call-list/{id}', 'CallListController@updateDetail')->name('cl.dtl.updt');
