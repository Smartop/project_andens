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

Route::get('/', 'PhotoController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/{nickname}', 'ProfileController@index')->name('userPage');
Route::get('/photo/{photo_id}', 'PhotoController@show');

Route::group(['middleware' => 'auth'], function () {

    Route::patch('editProfile', 'ProfileController@update')->name('editProfile');

    Route::post('addphoto', 'PhotoController@store')->name('storeImage');
    Route::post('publishComment', 'CommentController@publish')->name('publishComment');
    Route::post('storeRating', 'RatingController@setRating')->name('storeRating');

    Route::get('favor-status', 'FavoriteToggleController@status');
    Route::post('favorite', 'FavoriteToggleController@toggleFavorite');

    Route::get('subscribe', 'SubscribeController@showSubscribe');
    Route::post('subscribe', 'SubscribeController@subscription')->name('subscribe');
});

