<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\Poster;

class PosterController extends Controller
{   

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
                $path = $file->move(public_path().'/guanggao',$newName);
                //返回上传的文件在服务器上的保存路径,给浏览器显示上传图片
                $filepath = 'guanggao/'.$newName;
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
        //广告浏览
        //搜索
        $input = $request->only('keywords');

        //判断搜索
       if($input){
            $data = Poster::where('link','like','%'.$input['keywords'].'%')->paginate(3);
        }else{
            $data = Poster::paginate(2);
        }
        return view('admin.poster.listposter',compact('data','input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //广告添加
        // return 111;
        
        return view('admin.poster.addposter');
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
        //1.接受表单提交过来的参数
        $input = $request->except('_token','img');
       // dd($input);
        $rule = [
            'link'=>'required|between:9,20',
        ];
        $mess = [
            'link.required'=>'链接不能为空',
            'link.between'=>'链接的长度必须在9-20位',
        ];
        $validator = Validator::make($input, $rule,$mess);
         // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/poster/create')
                ->withErrors($validator)
                ->withInput();
        }
//        向数据表中添加数据的第一种方法
//            创建一个空的用户对象
          $poster = new Poster();
          if($input['art_thumb']){
                $img = substr($input['art_thumb'],9);
          }else{
                $img = 'default.jpg';
          }
          $poster->img = $img;
          $poster->link = $input['link'];
          $res = $poster->save();

        // 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('admin/poster')->with('msg','添加成功');
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
         // return 22211;
        // dd($id);
        
        
        //查询用户原来状态
        $date = Poster::where('id',$id)->value('active');
        // dd($date);
        
        if($date){

            //更新数据库
            $update = Poster::where('id',$id)->update(['active'=>0]);
            return 0;
        } else {

            //更新数据库
            $update = Poster::where('id',$id)->update(['active'=>1]);
            return 1;
        }
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
        // 获取传值id查询记录
        $poster = Poster::find($id);
        return view('admin/poster/editposter',compact('poster'));
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
        //
        //修改图片
        $input = $request->only('link','art_thumb');
        // dd($input);
        $rule = [
            'link'=>'required|between:9,20',  
        ];
        $mess = [
            'link.required'=>'链接不能为空',
            'link.between'=>'链接的长度必须在9-20位', 
        ];
        $validator = Validator::make($input, $rule,$mess);
         // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/poster/create')
                ->withErrors($validator)
                ->withInput();
        }
     //        向数据表中添加数据的第一种方法
//            创建一个空的用户对象
          $poster = Poster::find($id);
         $oldimg = 'guanggao/'.$poster->img;
       // dd($oldimg);
        $img = substr($input['art_thumb'],9);
        // dd($img);
        if($img){
            $poster->img = $img;
            if(!$oldimg == 'default.jpg'){
                unlink($oldimg);
            }   
        }
          $poster->link = $input['link'];
          $res = $poster->save();

        // 判断是否修改成功
        if($res){
            //如果修改成功，跳转到列表页
            return redirect('admin/poster')->with('msg','修改成功');
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
        //
              //删除
        $res = Poster::find($id)->delete();
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
