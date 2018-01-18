<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fig;
use Illuminate\Support\Facades\Validator;


class ImgController extends Controller
{
    

      //文件上传
    public function upload(Request $request)
    {

         //请求中是否携带上传文件
        if($request->hasFile('img')){
            //获取上传文件
            $file = $request->file('img');
            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名
                //生成新的且唯一的文件名
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                //将文件移动到指定的位置move(路径位置()./)
                $path = $file->move(public_path().'/lunbotu',$newName);
                //返回上传的文件在服务器上的保存路径,给浏览器显示上传图片
                $filepath = 'lunbotu/'.$newName;
                //返回文件的路径
                return  $filepath;
            }
        }
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //搜索
        $input = $request->only('keywords');

        //判断搜索
       if($input){
            $data = Fig::where('title','like','%'.$input['keywords'].'%')->paginate(3);
        }else{
            $data = Fig::paginate(3);
        }

        return view('admin/img/imglist',compact('data','input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.img.imgadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.接受表单提交过来的参数
        $input = $request->except('_token');
        $rule = [
            'title'=>'required|between:2,18',
            'site' => 'required',
        ];
        $mess = [
            'title.required'=>'标题不能为空',
            'title.between'=>'标题的长度必须在2-18位',
            'site.required' =>'外链不能为空',
        ];
        $validator = Validator::make($input, $rule,$mess);
         // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/img/create')
                ->withErrors($validator)
                ->withInput();
        }
//        向数据表中添加数据的第一种方法
//            创建一个空的用户对象
          $fig = new Fig();
          if($input['art_thumb']){
                $img = substr($input['art_thumb'],8);
          }else{
                $img = 'default.jpg';
          }
          $fig->img = $img; 
          $fig->site = $input['site'];
          $fig->title = $input['title'];
          $res = $fig->save();

        // 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('admin/img')->with('msg','添加成功');
        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
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
      
        // 获取传值id查询记录
        $img = Fig::find($id);
        return view('admin/img/imgedit',compact('img'));
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
          //修改图片
        $input = $request->only('title','art_thumb','img','site');
      
        $rule = [
            'title'=>'required|between:2,18',
            'site' => 'required',
        ];
        $mess = [
            'title.required'=>'标题不能为空',
            'title.between'=>'标题的长度必须在2-18位',
             'site.required' =>'外链不能为空',
        ];
        $validator = Validator::make($input, $rule,$mess);
         // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/img/create')
                ->withErrors($validator)
                ->withInput();
        }
     //        向数据表中添加数据的第一种方法
//            创建一个空的用户对象
          $fig = Fig::find($id);
         $oldimg = 'lunbotu/'.$fig->img;
       // dd($oldimg);
        $img = substr($input['art_thumb'],8);
        // dd($img);
        if($img){
            $fig->img = $img;
            if(!$oldimg == 'default.jpg'){
                unlink($oldimg);
            }   
        }
          $fig->title = $input['title'];
           $fig->site = $input['site'];
          $res = $fig->save();

        // 判断是否修改成功
        if($res){
            //如果修改成功，跳转到列表页
            return redirect('admin/img')->with('msg','修改成功');
        }else{
            //如果修改失败，返回到修改页
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
        $res = Fig::find($id)->delete();
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
    }
}
