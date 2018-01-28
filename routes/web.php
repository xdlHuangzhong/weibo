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


//管理员添加管理
Route::post('user/upload','UserController@upload');
Route::resource('user','UserController');

// 后台普通用户管理
Route::resource('users','UsersController');

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


    //轮播图模块
//修改路由
    Route::post('reimg','ImgController@update');
//上传路由
    Route::post('img/upload','ImgController@upload');
//热图添加
    Route::resource('img','ImgController');

//发帖模块
    Route::get('content/index','ContentController@index');
    Route::get('content/info','ContentController@info');
    Route::resource('content','ContentController');

//后台加载发送系统消息页面路由
Route::get('/news/{id}','NewsController@add');
//后台执行发送系统消息功能路由
Route::post('/send/{id}','NewsController@send');


    // 数据库数据存入config/webconfig.php
    Route::get('config/putcontent','ConfigController@putContent');
// 网站配置资源路由
    Route::resource('config','ConfigController');
// 网站配置数据更新
    Route::post('config/update','ConfigController@Update');


    //广告图片上传
    Route::post('poster/upload','PosterController@upload');
    //广告模块
    Route::resource('poster','PosterController');



});





//=============================前台=============================//

//注册页
Route::get('home/register/index','Home\RegisterController@index');
//加载注册方法
Route::post('home/register/send','Home\RegisterController@send');
//加载激活方法
Route::get('home/active','Home\RegisterController@active');
//前台首页
Route::get('home/index','Home\IndexController@index');
//加载登录的方法
Route::resource('home/login','Home\LoginController');


//热门微博列表
Route::get('home/hot','Home\IndexController@hot');


//前台用户模块
Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'hislogin'],function(){
//退出登录
Route::get('logout/','LoginController@logout');


// 点赞
    Route::resource('Handle','HandleController');
    
//忘记密码
Route::get('forget','RegisterController@forget');
Route::post('doforget','RegisterController@doForget');
//找回密码
Route::get('reset','RegisterController@reset');
Route::post('doreset','RegisterController@doReset');



Route::post('user/upload','InfoController@upload');
Route::post('user/pinglun','InfoController@pinglun');
Route::post('user/showpinglun','InfoController@showpinglun');






//加载个人详情
Route::get('userinfo/index','UserinfoController@index');
Route::get('userinfo/share','UserinfoController@share');
//处理图片



Route::post('user/upload','InfoController@upload');
//加载个人中心发帖页
Route::resource('user','InfoController');
//加载补充个人信息页面
Route::get('userinfo/add','InfoController@add');
//加载个人页面修改方法
Route::post('userinfo/update','InfoController@update');

//提交修改数据
Route::post('userinfo/upload','UserinfoController@upload');
//修改个人信息页
Route::resource('userinfo','UserinfoController');
});



Route::get('comment','CommentController@index');
Route::post('comment/add','CommentController@addComment');

//加密演示
//Route::get('admin/crypt','Admin\LoginController@crypt');







