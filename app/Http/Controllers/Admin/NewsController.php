<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User_info;
use App\Model\Message;
use Session;
class NewsController extends Controller
{
    public function add ($id)
    {
    	
    	//获取管理员用户名
    	$admin = Session('admin')->name;

    	//获取用户名
    	$user = User_info::where('uid',$id)->first();

    	return view('admin/users/news',['admin'=>$admin,'user'=>$user]);
    }

    public function send ($id)
    {
    	
    	//获取管理员ID
    	$res['aid'] = Session('admin')->id;

    	//获取用户ID
    	$res['uid'] = $id;

    	//获取消息内容
    	$res['content'] = $_POST['content'];

    	//获取发送时间
    	$res['time'] = $_POST['time'];

    	//将信息存入数据库
    	$data = Message::insert($res);

    	if($data){
    		return redirect('admin/users')->with('msg','消息发送成功！');
    	} else {
    		return redirect('admin/index')->with('msg','消息发送失败！');
    	}
    }
}
