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

Route::get('/', 'KudoController@index')->name('kudo.index');
Route::get('/kudo/create', 'KudoController@create')->name('kudo.create');
Route::post('/kudo/store', 'KudoController@store')->name('kudo.store');
