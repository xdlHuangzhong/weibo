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
      $cid=$request->input('cid');
      $uid=$request->input('uid');
      // 查询是否点赞该微博
      $res=Thumb::where(array('cid'=>$cid,'uid'=>$uid))->first();
      if(is_null($res)){
        // 未点赞
        // 赞 +1
        $ed=DB::table('contents')->where('cid',$cid)->increment('pnum');
        if($ed){
          // 写入数据
          $res=Thumb::insert(array('cid'=>$cid,'uid'=>$uid));
          if($res){
            // 返回赞数量
            $res=DB::table('contents')->where('cid',$cid)->pluck('pnum');
            return $res;
          }
        }else{return false;}
      }else{
        // 已点赞
        // 赞 -1
        $ec=DB::table('contents')->where('cid',$cid)->decrement('pnum');
        if($ec){
          // 删除数据
          $res=Thumb::where(array('cid'=>$cid,'uid'=>$uid))->delete();
          if($res){
            // 返回赞数量
            $res=DB::table('contents')->where('cid',$cid)->pluck('pnum');
            return $res;
          }
        }else{return false;}
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
