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
Route::get('/', ['as' => 'login', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
        Route::get('/', [
            'as' => 'index',
            'uses' => 'CategoryController@index'
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');
