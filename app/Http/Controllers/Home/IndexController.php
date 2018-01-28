<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\User_info;
use App\Model\User;
use App\Model\Content;

class IndexController extends Controller
{
    	

    public function index(){
    	//友情链接
    	$data = \DB::table('friends')->get();
    	//公告
    	$date = \DB::table('notice')->get();
    	//轮播图
    	$bata = \DB::table('fig')->get();
    	//全部微博
    	//查询微博内容
        	$index = Content::with('user_info')->orderBy('time','desc')->paginate(10);
        	// foreach($index as $k=>$v){
        	// 	dd($v->pic);
        	// }
//    	 dd($index);
    	
        	
    	return view('home.index',['data' => $data,'date' => $date,'bata' => $bata,'index'=>$index]);
    	
    }         

    //加载热门微博
    public function hot ()
    {
        //友情链接
    	$data = \DB::table('friends')->get();
    	//公告
    	$date = \DB::table('notice')->get();
    	//轮播图
    	$bata = \DB::table('fig')->get();
    	//查询热门微博内容
        $index = Content::with('user_info')
        ->where('hot',1)
        ->orderBy('time','desc')
        ->paginate(5);
//		dd($index);

       return view('home.index',['data' => $data,'date' => $date,'bata' => $bata,'index'=>$index]);
    }
}
