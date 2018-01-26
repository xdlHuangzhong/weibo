<?php


namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Userinfo;
use DB;
class UserinfoController extends Controller
{
    //个人详情页
    public function index(Request $request)
    {
    	// $data = DB::table('user_info')->get();
        $friends = DB::table('friends')->get();
    	// dd($data);
    	return view('home.userinfo.userinfo',['friends'=>$friends]);
    }
    public function share()
    {
    	return view('home.userinfo.share');
    }
}
