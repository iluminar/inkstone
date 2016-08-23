<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('dashboard', 'HomeController@index');

Route::get('posts/create', ['as' => 'post.create', 'uses' => 'PostController@create']);
Route::post('posts/store', ['as' => 'post.store', 'uses' => 'PostController@store']);