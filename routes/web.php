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
Route::get('danh-sach-user',['as' => 'get.ListUser','uses' => 'AdminController@getListUser']);
Route::get('danh-sach-bai-viet',['as' => 'get.ListUser','uses' => 'AdminController@getListPost']);