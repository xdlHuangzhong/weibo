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
//广告控制器
Route::get('/advert/index','AdvertController@index');
Route::get('/admin/index','Admin\AdminController@index');
