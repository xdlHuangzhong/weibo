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

//用户模块
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){
//用户添加页
Route::resource('user','UserController');
//后台首页
Route::get('index', 'LoginController@index');
//退出登录
Route::get('logout/','LoginController@logout');

//系统公告模块
//图片上传路由
Route::post('notice/upload','NoticeController@upload');
//图片修改路由
Route::post('notice/reupload','NoticeController@upload');
//公告资源路由
Route::resource('notice', 'NoticeController');

//友情链接路由
Route::resource('friends','FriendsController');
//文章分类路由
Route::post('cate/changeorder','CateController@changeorder');
Route::resource('cate','CateController');

});
//前台用户模块
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){
//前台首页
Route::get('index','IndexController@index');
//注册页
Route::get('register/index','RegisterController@index');
//加载注册方法
Route::post('register/send','RegisterController@send');
//加载激活方法
Route::get('active','RegisterController@active');
//忘记密码
Route::get('forget','RegisterController@forget');
Route::post('doforget','RegisterController@doForget');
//加载登录的方法
Route::resource('login','LoginController');
});




//路由模块
//修改路由
Route::post('admin/reimg','Admin\ImgController@update');
//上传路由
Route::post('admin/img/upload','Admin\ImgController@upload');
//热图添加
Route::resource('admin/img','Admin\ImgController');

//发帖模块
Route::get('admin/content/index','Admin\ContentController@index');
Route::get('admin/content/info','Admin\ContentController@info');
Route::resource('admin/content','Admin\ContentController');

