<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'TripController@index');

Route::resource('trip', 'TripController');
Route::resource('trip.step', 'StepController');
Route::get('photo/listing', ['as' => 'photo.listing', 'uses' => "PhotoController@listPopup"]);
Route::get('photo/addPopup', ['as' => 'photo.addform', 'uses' => "PhotoController@addForm"]);
Route::resource('photo', 'PhotoController');
Route::model('trip', 'App\Trip');
Route::model('step', 'App\Step');
Route::model('photo', 'App\Photo');
