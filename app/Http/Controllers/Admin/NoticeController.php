<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\model\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //显示公告列表页

        //获取提交搜索条件
        $input = $request->only('keywords');
//        dd($input);
        if($input){
            $data = Notice::where('name','like','%'.$input['keywords'].'%')->paginate(2);
        }else{
            $data = Notice::paginate(2);
        }
        return view('admin/notice/index',compact('data','input'));
        // return 123;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加公告页面
        return view('admin/notice/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收表单提交

        $input = $request->except('_token','updated_at','created_at','logo');

//        dd($input);

        $rule = [
            'name'=>'required',
            'content'=>'required',
//            'art_thumb'=>'required',
        ];
        //提示信息
        $mess = [
            'name.required'=>'公告标题不能为空！',
            'content.required'=>'公告内容不能为空！',
//            'art_thumb.required'=>'公告图片不能为空！',

        ];
        $validator = Validator::make($input,$rule,$mess);
        // dd($validator);
        //判断验证信息失败
        if ($validator->fails()){
            return redirect('admin/notice/create')
                ->withErrors($validator)
                ->withInput();
        }
        //添加公告

//
        $logo = substr($input['art_thumb'],10);

        $input = $request->except('_token','updated_at','created_at');
        // dd($input);
        //修改公告

        $notice = new Notice();
        $notice -> name = $input['name'];
        $notice -> bank = $input['bank'];
        $notice -> time = $input['time'];
        if($logo){
            $notice -> logo = $logo;
        }else{
            $notice -> logo = '';
        }

        $notice -> content = $input['content'];
        $res = $notice->save();
        //判断是否添加成功
            if($res){
                //如果添加成功，跳转到列表页
               return redirect('admin/notice')->with('msg','添加成功');
                
            }else{
                //如果添加失败，返回到添加页
                return '添加失败';
            }

    }
    //图片上传
    public function upload(Request $request)
    {

        //请求中是否携带上传文件
        if($request->hasFile('logo')){
            //获取上传文件
            $file = $request->file('logo');
            //判断上传文件的有效性
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名
                //生成新的且唯一的文件名
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                //将文件移动到指定的位置move(路径位置()./)
                $path = $file->move(public_path().'/noticepic',$newName);
                //返回上传的文件在服务器上的保存路径,给浏览器显示上传图片
                $filepath = 'noticepic/'.$newName;
                //返回文件的路径
                return  $filepath;
            }
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
        //公告修改页面
        //获取传值id查询记录
        $notice = Notice::find($id);

        return view('admin/notice/edit',compact('notice'));

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
        //修改公告业务
        $input = $request->except('_token','updated_at','created_at','logo');
//        dd($input);

        $rule = [
            'name'=>'required',
            'content'=>'required',
        ];
        //提示信息
        $mess = [
            'name.required'=>'公告修改标题不能为空！',
            'content.required'=>'公告修改内容不能为空！',

        ];
        $validator = Validator::make($input,$rule,$mess);
        // dd($validator);
        //判断验证信息失败
        if ($validator->fails()){
            return redirect('admin/notice/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        //执行修改

        $notice = Notice::find($id);
        $oldlogo = 'noticepic/'.$notice->logo;
//        dd($oldlogo);


        $logo = substr($input['art_thumb'],10);
        if($logo){
            $notice->logo = $logo;
            if($oldlogo != 'noticepic/'){
                unlink($oldlogo);
            }

        }
        $notice->name = $input['name'];
        $notice->content = $input['content'];
        $res = $notice->save();
        if($res){
            return redirect('admin/notice');
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
        $res = Notice::find($id)->delete();
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
