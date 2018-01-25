<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use Illuminate\Support\Facades\Validator;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
//
        //实例化分类对象
//        $cate = new Cate();
//        $cates = $cate->getcate();
        $input = $request->only('keywords');
//        dd($input);
        if($input){
            $cates = Cate::where('name','like','%'.$input['keywords'].'%')->orderby('path')->paginate(5);
        }else{
            $cates = Cate::orderby('path')->paginate(5);
        }
        return view('admin/cate/index',compact('cates','input'));
    }

    //修改排序方法
    public function changeorder(Request $request)
    {
        $input = $request->except('_token');
//        dd($input);
        $cate = Cate::find($input['id']);
        $res = $cate->update(['order'=>$input['order']]);
        if($res)
        {
            $data=[
                'status'=>0,
                'msg'=>'排序修改成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'排序修改失败'
            ];
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //分类列表页
    public function create(Request $request)
    {
        //获取1级分类
        $catone = Cate::where('pid',0)->get();

        return view('admin/cate/create',compact('catone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //分类添加页面
    public function store(Request $request)
    {
        //
        $input = $request->except('_token','updated_at','created_at');
//        dd($input);
        $rule = [
            'name'=>'required',
            'title'=>'required',
            'keywords'=>'required',
            'order'=>'required|regex:/^\d{1,3}$/'
        ];
        //提示信息
        $mess = [
            'name.required'=>'分类标题不能为空！',
            'title.required'=>'分类介绍不能为空！',
            'keywords.required'=>'分类关键字不能为空！',
            'order.required'=>'分类排序不能为空！',
            'order.regex'=>'分类标题只能输入最多三位数字！',




        ];
        $validator = Validator::make($input,$rule,$mess);
//         dd($validator);
        //判断验证信息失败
        if ($validator->fails()){
            return redirect('admin/cate/create')
                ->withErrors($validator)
                ->withInput();
        }
//                dd($input);

        $cate = New Cate();
        $cate->pid = $input['pid'];

        $cate->name = $input['name'];


        $cate->title =$input['title'];
        $cate->keywords =$input['keywords'];
        $cate->order =$input['order'];
        if(!$input['pid'] == 0){
            $cate->path = 0 . ',' . $input['pid'];
        }else{
            $cate->path = 0;
        }

        $res = $cate->save();
        if($res)
        {
            return redirect('admin/cate')->with('msg','添加成功');
        }else{
            return redirect('admin/cate/create')->with('msg','添加失败');
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
        //

        $cate = Cate::find($id);
        $catone = Cate::where('pid',0)->get();

        return view('admin/cate/edit',compact('cate','catone'));
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
        //修改分类
        $input = $request->except('_method','_token','updated_at','created_at');
        $rule = [
            'name'=>'required',
            'title'=>'required',
            'keywords'=>'required',

        ];
        //提示信息
        $mess = [
            'name.required'=>'分类标题不能为空！',
            'title.required'=>'分类介绍不能为空！',
            'keywords.required'=>'分类关键字不能为空！',





        ];
        $validator = Validator::make($input,$rule,$mess);
//         dd($validator);
        //判断验证信息失败
        if ($validator->fails()){
            return redirect('admin/cate/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
//        dd($input);
        $cate = Cate::find($id);
        $cate->name = $input['name'];
        $cate->title = $input['title'];
        $cate->keywords = $input['keywords'];
        $cate->pid = $input['pid'];
        $res = $cate->save();
        if($res){
            return redirect('admin/cate');
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

        //删除
        //判断分类下有没有子分类如果没有可以删除
        //获取父分类
        $fcate = Cate::where("pid",'=',$id)->first();
//        dd($fcate);

        if(!$fcate){
            $res = Cate::find($id)->delete();

            if($res){
                $data = [
                    'status'=>0,
                    'message' => '删除成功'
                ];
            }else{
                $data = [
                    'status'=>1,
                    'message' => '删除失败'
                ];

            }
            return $data;

        }else{
            $data = [
                'status'=>1,
                'message' => '下面有子分类删除失败'
            ];

            return $data;
        }




    }
}
