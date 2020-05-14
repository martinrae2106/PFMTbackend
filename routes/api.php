<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//this one is behind authorisation wall
Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/country', 'CountryController@store');
Route::post('/countries/{id}', 'CountryController@update');
Route::delete('/countries/{id}', 'CountryController@destroy');

Route::post('/region', 'RegionController@store');
Route::patch('/regions/{region}', 'RegionController@update');
Route::delete('/regions/{id}', 'RegionController@destroy');

Route::post('/school', 'SchoolController@store');
Route::patch('/schools/{school}', 'SchoolController@update');
Route::delete('/schools/{id}', 'SchoolController@destroy');

Route::get('/donators', 'DonatorController@index');
Route::get('/donator/{id}', 'DonatorController@get');
Route::post('/donators/{id}', 'DonatorController@update');
Route::delete('/donators/{id}', 'DonatorController@destroy');

Route::get('/donations', 'DonationController@index');
Route::get('/donation/{id}', 'DonationController@get');
Route::post('/donations/{id}', 'DonationController@update');
Route::delete('/donations/{id}', 'DonationController@destroy');

Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
});

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::get('/countries', 'CountryController@index');
Route::get('/country/{id}', 'CountryController@get');

Route::get('/regions', 'RegionController@index');
Route::get('/region/{id}', 'RegionController@get');

Route::get('/schools', 'SchoolController@index');
Route::get('/school/{id}', 'SchoolController@get');
Route::get('/schools/{id}', 'SchoolController@getByRegionId');

Route::post('/donator', 'DonatorController@store');

Route::post('/donation', 'DonationController@store');

Route::post('/checkout', 'CheckoutController@store');