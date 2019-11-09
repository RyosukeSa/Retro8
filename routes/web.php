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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('review/create', 'Admin\ReviewController@add');
    Route::post('review/create', 'Admin\ReviewController@create');
    Route::get('review/index', 'Admin\ReviewController@index');
    Route::get('review/conf', 'Admin\ReviewController@conf');
    Route::get('review/edit', 'Admin\ReviewController@edit');
    Route::post('review/edit', 'Admin\ReviewController@update');
    Route::get('review/delete', 'Admin\ReviewController@delete');
    Route::get('review/ref', 'Admin\ReviewController@ref');
    Route::get('review/comment', 'Admin\ReviewController@check');
    Route::post('review/comment', 'Admin\ReviewController@comment');
    Route::get('review/comdelete', 'Admin\ReviewController@comdelete');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/ref', 'Admin\ProfileController@ref');
    Route::get('profile/index', 'Admin\ProfileController@frindex');
    Route::get('home', 'Admin\ProfileController@index');
});
Auth::routes();

Route::get('/', 'ReviewController@index');


