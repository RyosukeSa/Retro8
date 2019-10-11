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
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('/', 'ReviewController@index');
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
