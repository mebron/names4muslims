<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//  return $request->user();
// });
Route::get('save-rating', 'Api\ApiController@setRating');
Route::get('favorite-count', 'Api\ApiController@getFavCount');
//Route::get('getdata','Api\ApiController@anyData');
Route::get('search', 'Api\ApiController@search');
Route::get('datatable/getdata', 'Api\ApiController@anyData');
