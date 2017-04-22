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

    Route::group(['prefix' => 'expense', 'as' => 'expense.'], function() {
        Route::get('/', [
            'as' => 'index',
            'uses' => 'ExpenseController@index'
        ]);

        Route::post('addAjax', [
            'as' => 'addAjax',
            'uses' => 'ExpenseController@postAddAjax'
        ]);

        Route::post('updateAjax', [
            'as' => 'updateAjax',
            'uses' => 'ExpenseController@postUpdateAjax'
        ]);

        Route::post('deleteAjax', [
            'as' => 'deleteAjax',
            'uses' => 'ExpenseController@postDeleteAjax'
        ]);

        Route::post('filterCategory', [
            'as' => 'filterCategory',
            'uses' => 'ExpenseController@postFilterCategory'
        ]);

        Route::post('filterCategoryDate', [
            'as' => 'filterCategoryDate',
            'uses' => 'ExpenseController@postFilterCategoryDate'
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');
