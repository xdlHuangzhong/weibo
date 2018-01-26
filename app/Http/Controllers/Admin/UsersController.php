<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User_info;
use App\Model\User;
use App\Model\Content;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = user::join('user_info','user_info.uid','=','user.id')->where('nickName','like','%'.$request->input('search').'%')->paginate(2);

    
        
        return view('admin.users.list',['data'=>$data, 'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        //获取用户名
        $nickName = User_info::where('uid','=',$id)->value('nickName');
        
        
        //获取用户微博信息
        $res = Content::where('uid','=',$id)->orderBy('time','desc')->paginate(10);
        
        return view('admin/users/show',['nickName'=>$nickName,'res'=>$res]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       echo 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    // return 111;
        
        //查询用户原来状态
        $date = User::where('id',$id)->value('active');
        // dd($date);
        
        if($date){

            //更新数据库
            $update = User::where('id',$id)->update(['active'=>0]);
            return 0;
        } else {

            //更新数据库
            $update = User::where('id',$id)->update(['active'=>1]);
            return 1;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
