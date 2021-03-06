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
Route::get('comments', ['as' => 'comment.index', 'uses' => "CommentController@index"]);
Route::resource('photo', 'PhotoController');
Route::post('trip/{trip}/step/{step}/comment', ['as' => 'trip.step.comment.store', 'uses' => "CommentController@store"]);
Route::get('comment/{comment}', ['as' => 'comment.edit', 'uses' => "CommentController@edit"]);
Route::put('comment/{comment}', ['as' => 'comment.update', 'uses' => "CommentController@update"]);
Route::delete('comment/{comment}', ['as' => 'comment.delete', 'uses' => "CommentController@destroy"]);
Route::model('trip', 'App\Trip');
Route::model('step', 'App\Step');
Route::model('photo', 'App\Photo');
Route::model('comment', 'App\Comment');
