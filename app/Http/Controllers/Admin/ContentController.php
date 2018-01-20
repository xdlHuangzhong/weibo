<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Content;
class ContentController extends Controller
{

    public function info(Request $request)
    {
        //分页
            $data = Content::orderBy('cid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $title = $request->input('keywords1');
                $uid = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($title)){
                    $query->where('title','like','%'.$title.'%');
                }
                //如果手机号不为空
                if(!empty($uid)){
                    $query->where('email','like','%'.$uid.'%');
                }
            })
            ->paginate($request->input('num', 2));
        return view('admin/contents/contents',['data'=>$data, 'request'=> $request]);
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
    public function edit($cid)
    {
        
          // 获取传值cid查询记录
        $content = Content::find($cid);
        // dd($content);
        return view('admin/contents/contents_info',compact('content'));
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
