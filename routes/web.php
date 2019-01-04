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
Route::get('dashboard',['as' => 'get.dashboard','uses' => 'AdminController@getDashboard']);
Route::group(['prefix' => 'user'], function () {
    Route::get('list',['as' => 'get.ListUser','uses' => 'AdminController@getListUser']);
     Route::get('disable/{id}',['as' => 'get.DisableUser','uses' => 'AdminController@getDisableUser']);
    Route::get('active/{id}',['as' => 'get.ActiveUser','uses' => 'AdminController@getActiveUser']);
});

Route::group(['prefix' => 'post'], function () {
    Route::get('list',['as' => 'get.ListPost','uses' => 'AdminController@getListPost']);
    Route::get('disable/{id}',['as' => 'get.DisablePost','uses' => 'AdminController@getDisablePost']);
    Route::get('active/{id}',['as' => 'get.ActivePost','uses' => 'AdminController@getActivePost']);
    Route::get('delete/{id}',['as' => 'get.DeletePost','uses' => 'AdminController@getDeletePost']);
});
Route::group(['prefix' => 'keyword'], function () {
    Route::get('list',['as' => 'get.ListKeyWord','uses' => 'AdminController@getListKeyWord']);
    Route::get('disable/{id}',['as' => 'get.DisableKeyWord','uses' => 'AdminController@getDisableKeyWord']);
    Route::get('active/{id}',['as' => 'get.ActiveKeyWord','uses' => 'AdminController@getActiveKeyWord']);
    Route::get('delete/{id}',['as' => 'get.DeleteKeyWord','uses' => 'AdminController@getDeleteKeyWord']);
});
