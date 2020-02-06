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
    return view('dashboard');
})->middleware('auth');

/* Auth Routes */
Route::get('login', 'AuthController@index')->name("login");
Route::post('post-login', 'AuthController@postLogin');
Route::get('register', 'AuthController@register'); //left it for testing purposes
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');
Route::get('testauth', function () {
    echo "You got auth!";
})->middleware('auth');

/* Autocomplete Routes */

Route::get('/search', 'AutocompleteController@index');
Route::post('/search/fetch', 'AutocompleteController@fetch')
    ->name('autocomplete.fetch')->middleware('auth'); // suggestions
Route::post('/search/fetchmac', 'AutocompleteController@fetchContract')
    ->name('autocomplete.fetchMac')->middleware('auth'); //suggestions
route::post('/search/getmac', 'AutocompleteController@getmac')
    ->middleware('auth'); // select and populate fields
route::post('/search/getcontractid', 'AutocompleteController@getContract')
    ->middleware('auth'); //select and populate fields

/* Test routes */
Route::get('/test', function () {
    return view('test');
});

/* MAC data routes */

Route::post('/mac/show', 'MacAddressController@view')->middleware('auth'); //last day view
Route::post('/mac/date', 'MacAddressController@showCustomDate')->middleware('auth'); //custom
