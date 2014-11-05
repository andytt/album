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

Route::resource('users', 'AuthController', ['only' => ['create', 'store']]);

Route::group([
    'before' => 'auth'
], function () {
    Route::get('/', 'AlbumController@index');

    Route::get('users/logout', [
        'as' => 'users.logout',
        'uses' => 'AuthController@logout'
    ]);

    Route::any('albums/{albumId}/privacy', [
        'as' => 'albums.api.privacy',
        'uses' => 'AlbumController@togglePublic'
    ]);

    Route::any('albums/{albumId}/settings', [
        'as' => 'albums.api.settings',
        'uses' => 'AlbumController@albumSettings'
    ]);

    Route::any('albums/{albumId}/photos/{photoId}/settings', [
        'as' => 'albums.photos.api.settings',
        'uses' => 'PhotoController@photoSettings'
    ]);

    Route::resource('albums.photos', 'PhotoController');
    Route::resource('albums', 'AlbumController');
});
