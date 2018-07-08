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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/clients/add', 'ClientController@create')->name('add');
Route::post('/clients/store', 'ClientController@store');
Route::get('/clients/edit/{id}', 'ClientController@edit');
Route::put('/clients/update/{id}', 'ClientController@update');
Route::get('/clients/delete/{id}', 'ClientController@destroy');
Route::get('/clients/view/{id}', 'ClientController@show');
