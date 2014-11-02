<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('users/login', [
    'as' => 'users.login',
    'uses' => 'AuthController@login'
]);

Route::group([
    'before' => 'auth'
], function () {
    Route::get('/', 'AlbumController@index');

    Route::get('users/logout', [
        'as' => 'users.logout',
        'uses' => 'AuthController@logout'
    ]);

    Route::resource('users', 'AuthController', ['only' => ['create', 'store']]);
    Route::resource('albums.photos', 'PhotoController');
    Route::resource('albums', 'AlbumController');
});
