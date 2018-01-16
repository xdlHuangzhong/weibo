<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\Friends;
class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //获取提交搜索条件
        $input = $request->only('keywords');
        // dd($input);
        if($input){
            $data = Friends::where('name','like','%'.$input['keywords'].'%')->paginate(1);
        }else{
            $data = Friends::paginate(2);
        }       

        return view('admin.friends.listfriends',compact('data','input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.friends.addfriends');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 123;
        $input = $request->except('_token');
        // dd($input);
        //检测表单检测规则
        $rule = [
            'link'=>'required|between:9,20',
            'name'=>'required|between:1,18|alpha_dash',
        ];
        //提示信息
        $mess = [
            'link.required'=>'链接名称不能为空！',
            'link.between'=>'链接名称必须在9-20位之间！',
            'name.required'=>'发布人不能为空！',
            'name.between'=>'发布人名称不能超过十八位',
        ];
        $validator = Validator::make($input,$rule,$mess);
        // dd($validator);  
        //判断验证信息失败
        if ($validator->fails()){
            return redirect('admin/friends/create')
                ->withErrors($validator)
                ->withInput();
         }
         //方法二
        $res = Friends::create(['link'=>$input['link'],'name'=>$input['name']]);
        //验证
        if($res){
            return redirect('/admin/friends');
        }else{
            return back();
        }
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
        //1.通过传来的id获取到要修改的用户记录
        $friends = Friends::find($id);
        return view ('admin.friends.editfriends',compact('friends'));
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
        //1获取信息
        $input = $request->all();
        // dd($input);
        $friends = Friends::find($id);

        $res = $friends->update($input);
        if($res){
            return redirect('admin/friends');
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
        
        $res = Friends::find($id)->delete();
        //如果删除成功
        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
        // return response()->json($data);
        // json_encode($data);
        return $data;
    }
}
