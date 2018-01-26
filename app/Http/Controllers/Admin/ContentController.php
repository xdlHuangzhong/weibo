<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Content;
use App\Model\User_info;
class ContentController extends Controller
{

    public function info(Request $request)
    {
       

        // 通过contents表联查user_info表查询相应发博人用户名
        $resd = Content::join('user_info','contents.uid','=','user_info.uid')

        ->Where('content','like','%'.$request->input('search').'%')

        ->paginate(3); 

        

        // 返回视图页面并把查询到的值发送到模板遍历到相应位置
        return view('admin/contents/contents',['resd'=>$resd,'request'=>$request]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
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
    public function show($cid)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $nickName = User_info::where('uid','=',$id)->value('nickName');
        
        
        //获取用户微博信息
        $res = Content::where('uid','=',$id)->first();
          // dd($res->time);
        // dd($content);
        return view('admin/contents/contents_info',['nickName'=>$nickName,'res'=>$res]);
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
        

        //查询用户原来状态
        $date = Content::where('cid',$id)->value('hot');
      // dd($date);
        
        if($date){

            //更新数据库
            $update = Content::where('cid',$id)->update(['hot'=>0]);
            return 0;
        } else {

            //更新数据库
            $update = Content::where('cid',$id)->update(['hot'=>1]);
            return 1;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid)
    {
        //     //删除
        $res = Content::find($cid)->delete();
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
