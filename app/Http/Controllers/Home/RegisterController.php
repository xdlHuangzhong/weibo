<?php

namespace App\Http\Controllers\Home;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Crypt;
class RegisterController extends Controller
{
    //register
    public function index()
    {
    	return view('home.register.index');
    	// return 123;
    }
    public function send(Request $request)
    {
    	
    	$this->validate($request,[ 
    	'name'=>'required|between:2,18',
    	'email'=>'required|email',
            'password'=>'required|between:5,18|alpha_dash',
            're-password'=>'same:password',
    	],[
    	'name.required'=>'用户名不能为空',
            'name.between'=>'用户名必须在2~18位之间',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱不合法',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码必须在5~18位之间',
            're-password.required'=>'确认密码不能为空',
            're-password.same'=>'确认密码不不一致',

    		]);
    	// $data = $request->except('_token','re-password');
    	// dd($data);
    	$input = $request->all();
    	$name = $input['name'];
        	$email = $input['email'];
        	$pass = Crypt::encrypt($input['password']);
        	$token = md5(date('Y-m-d H:i:s').rand(1000,9999));

        	//        dd($input);

        // 注册未激活的用户
        $user = User::create(['name'=>$name,'password'=>$pass,'email'=>$input['email'],'token'=>$token]);
        if($user){

            //向用户注册的邮箱发送激活邮件

//        Mail::send('使用的模板','模板中使用的变量','设置邮箱相关的信息如发件人收件人主题')

            Mail::send('home.mails.active', ['user' => $user], function ($m) use ($user) {

                $m->to($user->email, $user->name)->subject('账号激活邮件!');
            });


            return redirect('home/index');
        }else{
            // 注册失败，返回注册页
            return back();
        }
    	
}
 //邮箱激活
    public function active(Request $request)
    {
//        1. 获取请求参数，根据id找到要激活的用户记录
         $input = $request->except('_token');
         $user = User::find($input['id']);

//        2. 验证请求的有效性
        if($input['token'] != $user->token){
            return '别太过分，请通过您的邮箱激活邮件来激活您的账号';
        }


//        3. 激活账号

        $res = $user->update(['active'=>1]);

        if($res){
            return redirect('home/index')->with('msg','恭喜您激活成功');
        }else{
            return '激活失败，请重新激活';
        }
    }
     //忘记密码页面
    public function forget()
    {
        return view('home.register.forget');
    }
}
