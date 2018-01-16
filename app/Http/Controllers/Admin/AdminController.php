<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    //index
    public function index()
    {
        return view('admin/index');
    }

    //到添加管理员页面
    public function add()
    {
    	return view('admin/user/add');
    }

    //将用户提交的添加用户数据保存到数据库的user表中，添加用户
     public function store(Request $request)
    {
    	
	//1. 获取表单提交的数据
	$input = $request->except('_token');
	

	//2. 执行添加操作
	// 插入

	$res = DB::table('admin')->insert(
	            ['name' => $input['name'], 'password' => $input['password'], 'email' => $input['email'], 'phone' => $input['phone'], 'pic' => $input['pic']]
	);



	// //3. 进行添加是否成功的判断，如果成功，跳转到列表页，如果失败，返回添加页

	// if($res){
	//              return redirect('user/index')->with('msg','添加成功');
	// }else{
	//             return back()->with('msg','添加失败');
	// }
     }
}
