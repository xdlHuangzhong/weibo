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

//后台登录模块
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

//用户管理模块
Route::get('admin/useradd','Admin\AdminController@add');

//系统公告模块
//图片上传路由
Route::post('admin/notice/upload','Admin\NoticeController@upload');
//公告资源路由
Route::resource('admin/notice', 'Admin\NoticeController');
