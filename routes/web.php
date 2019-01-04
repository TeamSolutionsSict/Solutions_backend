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
<<<<<<< HEAD
     Route::get('disable/{id}',['as' => 'get.DisableUser','uses' => 'AdminController@getDisableUser']);
    Route::get('active/{id}',['as' => 'get.ActiveUser','uses' => 'AdminController@getActiveUser']);
=======
>>>>>>> 8ec9c35a322dc4f697616c3718a3d55c68a28a3b
});

Route::group(['prefix' => 'post'], function () {
    Route::get('list',['as' => 'get.ListPost','uses' => 'AdminController@getListPost']);
<<<<<<< HEAD
    Route::get('disable/{id}',['as' => 'get.DisablePost','uses' => 'AdminController@getDisablePost']);
    Route::get('active/{id}',['as' => 'get.ActivePost','uses' => 'AdminController@getActivePost']);
    Route::get('delete/{id}',['as' => 'get.DeletePost','uses' => 'AdminController@getDeletePost']);
=======
>>>>>>> 8ec9c35a322dc4f697616c3718a3d55c68a28a3b
});

Route::group(['prefix' => 'keyword'], function () {
    Route::get('list',['as' => 'get.ListKeyWord','uses' => 'AdminController@getListKeyWord']);
    Route::get('disable/{id}',['as' => 'get.DisableKeyWord','uses' => 'AdminController@getDisableKeyWord']);
    Route::get('active/{id}',['as' => 'get.ActiveKeyWord','uses' => 'AdminController@getActiveKeyWord']);
});
