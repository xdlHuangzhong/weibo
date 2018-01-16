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

//友情链接页面
Route::resource('admin/friends','Admin\FriendsController');
// Route::get('admin/friends','Admin\FriendsController@friends');//浏览链接页面
// Route::get('admin/add','Admin\FriendsController@add');//添加链接页面
// Route::post('admin/addfriends','Admin\FriendsController@addfriends');//添加链接处理
// Route::get('admin/friends','Admin\FriendsController@listfriends');//浏览链接列表
// 							//加上id可以接收到传参
// Route::get('admin/editfriends/{id}','Admin\FriendsController@edit');//修改链接页
// Route::post('admin/updatefriends/{id}','Admin\FriendsController@update');//修改链接执行
