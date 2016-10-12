<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => '{user}', 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'UserController@dashboard'])->middleware('auth');

    Route::get('posts', ['as' => 'user.posts', 'uses' => 'UserController@getUserAllPost']);
});

Route::group(['prefix' => 'posts', 'namespace' => 'App\Http\Controllers\Blog'], function() {

    Route::group(['middleware' => 'auth'], function() {

        Route::get('/', ['as' => 'post.index', 'uses' => 'PostController@index']);

        Route::get('create', ['as' => 'post.create', 'uses' => 'PostController@create']);

        Route::post('/', ['as' => 'post.store', 'uses' => 'PostController@store']);

        Route::get('{slug}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit']);

        Route::patch('{slug}', ['as' => 'post.update', 'uses' => 'PostController@update']);

        Route::patch('{slug}/publish', ['as' => 'post.publish', 'uses' => 'PostController@publish']);

        Route::get('{slug}/delete', ['as' => 'post.delete', 'uses' => 'PostController@delete']);

        Route::post('{slug}/comments', ['as' => 'comment.store', 'uses' => 'CommentController@store']);
    });

    Route::get('{slug}', ['as' => 'post.single', 'uses' => 'PostController@single']);
});
