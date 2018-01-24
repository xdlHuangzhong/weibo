<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User_info;
use App\Model\User;

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

        // $data = User_info::orderBy('id','asc')
        //     ->where(function($query) use($request){
        //         //检测关键字
        //         $name = $request->input('keywords1');
        //         //如果用户名不为空
        //         if(!empty($name)){
        //             $query->where('name','like','%'.$name.'%');
        //         }
                
        //     })
        //     ->paginate($request->input('num', 2));

            // dd($data);
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
        //
        return 2131;
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
