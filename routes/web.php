<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('dashboard', 'UserController@dashboard');

Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function() {

    Route::get('/', ['as' => 'post.index', 'uses' => 'PostController@index']);

    Route::get('create', ['as' => 'post.create', 'uses' => 'PostController@create']);

    Route::post('/', ['as' => 'post.store', 'uses' => 'PostController@store']);

});