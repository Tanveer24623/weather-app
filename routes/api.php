<?php

use Zttp\Zttp;
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

Route::get('/weather', function(){
    $apikey = config('services.darksky.key');
    $lat = request('lat');
    $lng = request('lng');

    $response = Zttp::get("https://api.darksky.net/forecast/$apikey/$lat,$lng?units=ca");

    return $response->json();
});







