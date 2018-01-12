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


//登录页面路由		
Route::get('admin/login','Admin\LoginController@login');

//登录页面的验证码
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');

//登录页面的处理逻辑
Route::post('admin/dologin','Admin\LoginController@dologin');

//加密演示
// Route::get('admin/crypt','Admin\LoginController@crypt');

//加载主页
Route::get('admin/index','Admin\AdminController@index');
