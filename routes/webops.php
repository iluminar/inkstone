<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::group(['prefix' => '{user}'], function () {

    Route::get('dashboard', ['as' => 'webops.dashboard', 'uses' => 'UserController@dashboard']);
});
