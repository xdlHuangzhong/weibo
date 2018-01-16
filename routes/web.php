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




//用户模块
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){
//用户添加页
Route::resource('user','UserController');
//后台首页
Route::get('index', 'LoginController@index');
//退出登录
Route::get('logout/','LoginController@logout');

});
