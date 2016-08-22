<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('posts/create', ['as' => 'post.create', 'uses' => 'PostController@create']);