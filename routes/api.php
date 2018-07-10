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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
 $api->post('login', 'App\Http\Controllers\apiController@login');
 $api->post('register', 'App\Http\Controllers\apiController@register');
 $api->post('user', 'App\Http\Controllers\apiController@get_user_details');
 $api->group(['middleware' => 'api.auth'], function ($api) {
   // $api->get('user', 'App\Http\Controllers\apiController@get_user_details');
 });

}); 

