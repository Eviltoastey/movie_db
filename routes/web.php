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
})->name('welcome');

Route::get('/movies/random', 'MovieController@random')->name('random');
Route::get('/movies/trending', 'MovieController@trending')->name('trending');
Route::get('/movies/request', 'MovieController@request')->name('request');
Route::post('/movies/request/store', 'MovieController@store')->name('store');
