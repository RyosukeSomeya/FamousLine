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

Route::resource('/', 'AdminController', ['only' => ['index']]);
Route::resource('/slamdunk', 'SlamdunkController');
Route::resource('/slamdunkcharacters', 'SlamdunkCharacterController', ['except' => ['show']]);
Route::resource('/jojo', 'JojoController');
Route::resource('/jojocharacters', 'JojoCharacterController', ['except' => ['show']]);
Route::resource('/gundam', 'GundamController');
Route::resource('/gundamcharacters', 'GundamCharacterController', ['except' => ['show']]);
