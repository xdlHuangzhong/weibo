<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\User_info;
use App\Model\Cate;
use App\Model\Content;

class IndexController extends Controller
{


	public function index(Request $request)
	{
		//友情链接
		$data = \DB::table('friends')->get();
		//公告
		$date = \DB::table('notice')->get();
		//轮播图
		$bata = \DB::table('fig')->get();
		$cate = Cate::get();
//		dd($cate);
		//全部微博
		//查询微博内容
//		$arr=[];

		$index = Content::with('user_info')->orderBy('time','desc')

			->where(function($query) use($request){
				//检测关键字
				$content = $request->input('keywords1');

				//如果用户名不为空
				if(!empty($content)){
					$query->where('content','like','%'.$content.'%');
				}

			})
			->paginate($request->input('num', 5));
		// dd($rev);

//        	 foreach($index as $k=>$v){
//        	 	$arr[]=($v->user_info->nickName);
//        	 }
//    	 dd($arr);


		return view('home.index',['data' => $data,'date' => $date,'bata' => $bata,'index'=>$index,'cate'=>$cate,'request'=> $request]);

	}

	//加载热门微博
    public function hot (Request $request)
    {
        //友情链接
    	$data = \DB::table('friends')->get();
    	//公告
    	$date = \DB::table('notice')->get();
    	//轮播图
    	$bata = \DB::table('fig')->get();
		$cate = Cate::get();
    	//查询热门微博内容
        $index = Content::with('user_info')
        ->where('hot',1)
        ->orderBy('time','desc')
			->where(function($query) use($request){
				//检测关键字
				$content = $request->input('keywords1');

				//如果用户名不为空
				if(!empty($content)){
					$query->where('content','like','%'.$content.'%');
				}

			})
			->paginate($request->input('num', 1));
//		dd($index);

       return view('home.index',['data' => $data,'date' => $date,'bata' => $bata,'index'=>$index,'cate'=>$cate,'request'=> $request]);
    }

	public function usercate(Request $request,$name)
	{
		$data = \DB::table('friends')->get();
		//公告
		$date = \DB::table('notice')->get();
		//轮播图
		$bata = \DB::table('fig')->get();
		$cate = Cate::get();
//		dd($cate);
		//全部微博
		//查询微博内容
//		$arr=[];
		$index = Content::with('user_info')->orderBy('time','desc')

			->where(function($query) use($request){
				//检测关键字
				$content = $request->input('keywords1');

				//如果用户名不为空
				if(!empty($content)){
					$query->where('content','like','%'.$content.'%');
				}

			})
			->paginate($request->input('num', 1));
//        	 foreach($index as $k=>$v){
//        	 	$arr[]=($v->user_info->nickName);
//        	 }
//    	 dd($arr);

		$user = User_info::where('work','=',$name)->paginate(10);
//		dd($user);
		return view('home.usercate',['data' => $data,'date' => $date,'bata' => $bata,'index'=>$index,'cate'=>$cate,'user'=>$user,'request'=> $request]);

//		dd($user);



	}
}
