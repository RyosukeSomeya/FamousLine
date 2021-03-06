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

// Route::get('/slamdunks', 'API\SlamdunkController@index');
Route::apiResource('slamdunk', 'SlamdunkApiController', ['only' => ['index', 'show']]);
Route::apiResource('jojo', 'JojoApiController', ['only' => ['index', 'show']]);
Route::apiResource('gundam', 'GundamApiController', ['only' => ['index', 'show']]);
