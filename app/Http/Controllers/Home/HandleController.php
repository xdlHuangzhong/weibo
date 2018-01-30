<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use DB;
use App\Model\Thumb;
class HandleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 写入数据
//        DB::table('report')->insert(array('cid'=>73,'uid'=>$uid));
        // 统计举报数量
//        $res=DB::table('report')->where('cid',73)->count();

//    $res=333;
//        $er=DB::table('contents')->where('cid',73)->update(array('report'=>$res));
//        $res=DB::table('contents')->where('cid',73)->pluck('report');
//        echo $res;
//        // 返回数量

//        $res=DB::table('contents')->where('cid',73)->pluck('report');
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
    * @return \Illuminate\Http\Response
    */
    public function report(Request $request)
    {
      // 举报
      $cid=$request->input('cid');
      $uid=$request->input('uid');
      // 查询是否举报过该帖子
      $res=DB::table('report')->where(array('cid'=>$cid,'uid'=>$uid))->first();
      if(is_null($res)){
        // 未举报
        // 写入数据
        DB::table('report')->insert(array('cid'=>$cid,'uid'=>$uid));
        // 统计举报数量
        $res=DB::table('report')->where('cid',$cid)->count();
        // 帖子表写入举报
        DB::table('contents')->where('cid',$cid)->update(array('report'=>$res));
        // 返回数量
        $res=DB::table('contents')->where('cid',$cid)->pluck('report');
        return $res;
      }else{
        // 统计举报数量
        $res=DB::table('report')->where('cid',$cid)->count();
        // 帖子表写入举报
        DB::table('contents')->where('cid',$cid)->update(array('report'=>$res));
        return ['status'=>0];
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cid=$request->input('cid');
      $uid=$request->input('uid');
      // 查询是否点赞该微博
      $res=Thumb::where(array('cid'=>$cid,'uid'=>$uid))->first();
      if(is_null($res)){
        // 未点赞
        // 写入数据
        $res=Thumb::insert(array('cid'=>$cid,'uid'=>$uid));
        // 统计赞数量
        $res=Thumb::where('cid',$cid)->count();
        // 帖子写入赞
        $ed=DB::table('contents')->where('cid',$cid)->update(array('pnum'=>$res));
        // 返回赞数量
        $res=DB::table('contents')->where('cid',$cid)->pluck('pnum');
        return $res;
      }else{
        // 已点赞
        // 删除数据
        $res=Thumb::where(array('cid'=>$cid,'uid'=>$uid))->delete();
        // 统计赞数量
        $res=Thumb::where('cid',$cid)->count();
        // 帖子写入赞
        $ed=DB::table('contents')->where('cid',$cid)->update(array('pnum'=>$res));
        // 返回赞数量
        $res=DB::table('contents')->where('cid',$cid)->pluck('pnum');
        return $res;
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
    public function destroy($id)
    {
        //
    }
}
