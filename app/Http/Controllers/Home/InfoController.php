<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Content;

use App\Model\Replay;
use App\Model\Cate;
use App\Model\User_info;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Session('user')->id;
//        $user = DB::table('user')->get();
//         dd($id);
        //查看微博内容
        $res = User_info::where('uid','=',$id)->first();

//         dd($res);
//        $rec = Content::where('uid','=',$id)->first();
        $rev = Content::with('user_info')->orderBy('time','desc')

        ->where(function($query) use($request){
                //检测关键字
                $content = $request->input('keywords1');
              
                //如果用户名不为空
                if(!empty($content)){
                    $query->where('content','like','%'.$content.'%');
                }
                
            })
            ->paginate($request->input('num', 3));
//        dd($rev);
        //获取帖子归属人
        $replay = Replay::where('cid','=',$id)->get();
        $count = Content::where('uid',$res->uid)->count();
//         dd($count);

        $data = DB::table('poster')->get();
        $date = DB::table('friends')->get();
        $notice = DB::table('notice')->get();
        $info = DB::table('friends')->get();

//         dd($rev);
        return view('home.userinfo.index',['res'=>$res,'rev'=>$rev,'data'=>$data,'date'=>$date,'notice'=>$notice,'replay'=>$replay,'count'=>$count,'info'=>$info,'request'=> $request]);


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
        $input = $request->except('_token','pic');
        // $data = $request->only('uid');
        // dd($input);
        //时间
        $time = date('Y-m-d H:i:s',time());
        
        // dd($pic);
        $input['time'] = $time;
         $pic = substr($input['art_thumb'],8);
        $input['pic'] = $pic;
        // dd($input);
        $res = Content::create($input);
        // $rev = User_info::create($data);
        // 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('home/user')->with('msg','添加成功');

        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
        }

    }

    //添加评论
    public function rpinglun(Request $request)
    {
//        return 111;
        $input = $request->except('_token','pic');

        //时间
        $time = date('Y-m-d H:i:s',time());

        // dd($pic);
        $input['time'] = $time;


        $res = Replay::create($input);

        //帖子表评论数+1
//        dd($input);
        $rplay = Replay::where('cid','=',$input['cid'])->count();
        $req = Content::find($input['cid']);
        $req->rnum = $rplay;
        $req = $req->save();

        // 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('home/user/'.$input['cid'])->with('msg','添加成功');

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
    //显示评论
    public function show($id)
    {

//      //获取评论
//         dd($id);
        $pinglun = Replay::where('cid','=',$id)->orderBy('rid','desc')->paginate(5);
//        dd($pinglun);



        $uid = Session('user')->id;
//        $user = DB::table('user')->get();
        // dd($id);
        //查看微博内容
        $res = User_info::where('uid','=',$uid)->first();

        // dd($res);

        $rev = Content::with('user_info')->where('cid','=',$id )->get();
//        dd($rev);

        //获取帖子归属人
        $replay = Replay::where('cid','=',$uid)->get();
        $count = Content::where('uid',$res->uid)->count();
        // dd($count);

        $data = DB::table('poster')->get();
        $date = DB::table('friends')->get();
        $notice = DB::table('notice')->get();


//         dd($rev);
        return view('home.userinfo.showpinglun',['res'=>$res,'rev'=>$rev,'data'=>$data,'date'=>$date,'notice'=>$notice,'replay'=>$replay,'count'=>$count,'pinglun'=>$pinglun]);

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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $res = Content::find($id)->delete();

         // dd($res);
        //如果删除成功
        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
        // return response()->json($data);
        // json_encode($data);
        return $data;
    }
    

      //文件上传
    public function upload(Request $request)
    {
        // return 123;
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
     //补充个人信息
    public function add()
    {
        $cate = Cate::get();
        return view('home.userinfo.add',['cate'=>$cate]);
    }
    //接收传过来的信息值
    public function update(Request $request)
    {
        $input = $request->except('_token','pic','updated_at','created_at');
//         dd($input);
        //执行插入数据库
         $pic = substr($input['art_thumb'],8);
         // dd($pic);
        $input['pic'] = $pic;
        // dd($input);
        $res = User_info::create($input);
        // 判断是否添加成功
        if($res){
            //如果添加成功，跳转到列表页
            return redirect('home/user')->with('msg','添加成功');
        }else{
            //如果添加失败，返回到添加页
            return back()->with('msg','添加失败');
        }
    }
   
}
