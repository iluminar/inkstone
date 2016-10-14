<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::group(['prefix' => '{user}', 'middleware' => 'auth'], function () {

    Route::get('dashboard', ['as' => 'webops.dashboard', 'uses' => 'UserController@dashboard']);
});

Route::group(['prefix' => 'projects', 'middleware' => 'auth'], function () {

    Route::get('create', ['as' => 'project.create', 'uses' => 'ProjectController@create']);

    Route::post('', ['as' => 'project.store', 'uses' => 'ProjectController@store']);
});

Route::group(['prefix' => 'servers', 'middleware' => 'auth'], function () {

    Route::get('create', ['as' => 'server.create', 'uses' => 'ServerController@create']);

    Route::post('', ['as' => 'server.store', 'uses' => 'ServerController@store']);
});

Route::group(['prefix' => 'sites', 'middleware' => 'auth'], function () {

    Route::get('create', ['as' => 'site.create', 'uses' => 'SiteController@create']);

    Route::post('', ['as' => 'site.store', 'uses' => 'SiteController@store']);
});
