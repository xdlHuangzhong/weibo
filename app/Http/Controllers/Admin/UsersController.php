<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Users;
use App\Model\Cate;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->only('keywords');
//        dd($input);

        if($input){
            $data = Users::where('name','like','%'.$input['keywords'].'%')->paginate(2);

        }else{
            $data = Users::with('posts')->paginate(2);
//            dd($data);

            //var_dump($data);die;
        }

        //获取查询数据所属的分类


        return view('admin/users/list',compact('data','input'));

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



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
//
        $users = Users::find($id);

        //获取1级分类
        $catone = Cate::where('pid','>','0')->get();
//        dd($users);
        return view('admin.users.edit',compact('users','catone'));
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
        //添加分类
        $input = $request->all();
//        dd($input);
        $users = Users::find($id);

        $users->cate_id = $input['cate_id'];

        $res = $users->save();

        if($res){
            return redirect('admin/users');
        }else{
            return back()->with('msg','修改失败');
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
