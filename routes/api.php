<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Movie Routes
|--------------------------------------------------------------------------
*/

// List Movies
Route::get('movie', 'MovieController@randomAPI');

// List Movie
Route::get('movies', 'MovieController@trendingAPI');
