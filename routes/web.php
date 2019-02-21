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

Route::get('/', 'FormController@index')->name('kudo.index');
Route::get('/kudo/create', 'FormController@create')->name('kudo.create');
Route::post('/kudo/store', 'FormController@store')->name('kudo.store');
