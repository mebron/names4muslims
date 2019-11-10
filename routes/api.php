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
Route::get('search', function (Request $request, App\Name $name) {
 $query = $request->get('query');
 $names = $name->where('name', 'like', $query . '%')->take(10)->get();
 return response()->json($names);
});
Route::get('datatable/getdata', 'Api\ApiController@anyData');
