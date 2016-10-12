<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('roadmap', ['as' => 'roadmap', 'uses' => 'HomeController@roadmap']);
