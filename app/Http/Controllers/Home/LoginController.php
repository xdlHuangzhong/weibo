<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Org\code\Code;
//加密的类
use Illuminate\Support\Facades\Crypt;
use Session;
use DB;
use App\Model\User;
use App\Model\User_info;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       

        return view('home.login.login',compact('data'));
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
        //在此写处理登录的方法
        $input = $request->except('_token');
        // dd($input);
        // 2.验证数据的有效性
         $rule = [
            'name'=>'required|between:2,18',
            'password'=>'required|between:5,18|alpha_dash',
            'code' =>'required',
        ];

        //提示信息
        $mess = [
            'name.required'=>'用户名不能为空',
            'name.between'=>'用户名的长度必须在5-18位',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码的长度必须在5-18位',
            'password.alpha_dash'=>'密码必须是数字字母下划线',
            'code.required' =>'验证码不能为空',
        ];

        $validator = Validator::make($input, $rule,$mess);
        //dd($validator);
        // 如果验证失败
        if ($validator->fails()) {
            return redirect('home/login')
                ->withErrors($validator)
                ->withInput();
        }
         //          验证码
        if(strtolower($input['code']) != strtolower(session('code')) ){
            return back()->with('errors','验证码错误');
        }

//        3. 判断用户名、密码、验证码的有效性
//        $input['username']
        
          $user = User::where('name',$input['name'])->first();
            //如果没有此用户，返回没有此用户的错误提示
          if (! $user) {
              return back()->with('errors','无此用户');
          }

//            密码不正确
          if(Crypt::decrypt($user->password) != $input['password']){
              return back()->with('errors','密码错误');
          }


          if($user->active != 1){
              return back()->with('errors','此账号没有激活，请先激活');
          }
          
//        4. 如果有效就登录到后台，验证失败就返回到添加页面
//        将用户的登录状态保存到session

            Session::put('user',$user);
            // dd($user->id);
            //查询user_info表进行判断
        $res = User_info::where('uid','=',$user->id)->first();
        if($res){
             return redirect('home/user');

         }else{
            //加载补充用户个人信息页
            return redirect('home/userinfo/add');
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
