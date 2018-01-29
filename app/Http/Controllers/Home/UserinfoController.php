<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User_info;
use  App\Model\Cate;
use DB;
use Session;
class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	// $data = DB::table('user_info')->get();

    	// dd($data);


        //
        $id = Session('user')->id;
        // dd($id);
        //查看微博内容
        $res = User_info::where('uid','=',$id)->first();

//         dd($cate);
        $rev = DB::table('contents')->where('uid','=',$id)->orderBy('time','desc')->paginate(2);
        $friends = DB::table('friends')->get();
        // dd($data);
        return view('home.userinfo.userinfo',['res'=>$res,'rev'=>$rev,'friends'=>$friends]);

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
    public function show()
    {
        //游戏
        return view('home.userinfo.youxi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return 111;
        $id = Session('user')->id;
        // dd($id);
        $cate = Cate::get();
        //查看微博内容
        $res = User_info::where('uid','=',$id)->first();
        // dd($res);
        $rev = DB::table('contents')->where('uid','=',$id)->orderBy('time','desc')->paginate(2);
        return view('home.userinfo.edit',['res'=>$res,'rev'=>$rev,'cate'=>$cate]);
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
       
       $input = $request->except('_token','_method');
//        dd($input);
           //接收出去_token,pic提交所有的数据
         //        向数据表中添加数据的第一种方法
    //         创建一个空的用户对象
          $userinfo = User_info::find($id);
         $oldimg = 'lunbotu/'.$userinfo->pic;
       // dd($oldimg);
        $pic = substr($input['art_thumb'],8);
        // dd($img);
        if($pic){
            $userinfo->pic = $pic;
            if(!$oldimg == 'default.jpg'){
                unlink($oldimg);
            }   
        }
         $userinfo->nickName = $input['nickName'];
           $userinfo->sex = $input['sex'];
           $userinfo->age = $input['age'];
           $userinfo->work = $input['work'];
          $res =$userinfo->save();

        // 判断是否修改成功
        if($res){
            //如果修改成功，跳转到列表页
            return redirect('home/userinfo')->with('msg','修改成功');
        }else{
            //如果修改失败，返回到修改页
            return back()->with('msg','修改失败');
        }
        // $input = $request->except('_token','pic');
        // dd($input);
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
      //分享页面
    public function share()
    {
        return view('home.userinfo.share');
    }

      public function upload(Request $request)
    {
          //请求中是否携带上传文件
        if($request->hasFile('pic')){
            //获取上传文件
            $file = $request->file('pic');
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
}
