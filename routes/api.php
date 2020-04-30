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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/countries', 'CountryController@index');
Route::get('/country/{id}', 'CountryController@get');
Route::post('/country', 'CountryController@store');
Route::post('/countries/{id}', 'CountryController@update');
Route::delete('/countries/{id}', 'CountryController@destroy');

Route::get('/donations', 'DonationController@index');
Route::get('/donation/{id}', 'DonationController@get');
Route::post('/donation', 'DonationController@store');
Route::post('/donations/{id}', 'DonationController@update');
Route::delete('/donations/{id}', 'DonationController@destroy');

Route::get('/regions', 'RegionController@index');
Route::get('/region/{id}', 'RegionController@get');
Route::post('/region', 'RegionController@store');
Route::patch('/regions/{region}', 'RegionController@update');
Route::delete('/regions/{id}', 'RegionController@destroy');

Route::get('/schools', 'SchoolController@index');
Route::get('/school/{id}', 'SchoolController@get');
Route::post('/school', 'SchoolController@store');
Route::patch('/schools/{school}', 'SchoolController@update');
Route::delete('/schools/{id}', 'SchoolController@destroy');

//issue with the create keeping nulls
Route::get('/donators', 'DonatorController@index');
Route::get('/donator/{id}', 'DonatorController@get');
Route::post('/donator', 'DonatorController@store');
Route::post('/donators/{id}', 'DonatorController@update');
Route::delete('/donators/{id}', 'DonatorController@destroy');

//issue with the create keeping nulls
Route::get('/donations', 'DonationController@index');
Route::get('/donation/{id}', 'DonationController@get');
Route::post('/donation', 'DonationController@store');
Route::post('/donations/{id}', 'DonationController@update');
Route::delete('/donations/{id}', 'DonationController@destroy');