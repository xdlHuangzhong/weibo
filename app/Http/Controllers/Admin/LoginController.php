<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use Illuminate\Support\Facades\Validator;

use App\Model\Admin;
//加密的类
use Illuminate\Support\Facades\Crypt;

use Session;

class LoginController extends Controller
{
    /*
     * 返回登录页面
     * @author xxx
     * @datetime 20180111 15:03
     * @param null
     * @return 返回一个后台的登录页面视图
     */
    public function login()
    {
        return view('admin.login');
    }

    // 验证码生成
    public function captcha($tmp)
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(10, 15, 40);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }


//获取加密密码
// public function crypt()
//     {
      




//       //crypt加密
//      $str = '123456';
//       $input= Crypt::encrypt($str);
//       dd($input);
      
        




//     }

    //处理登录逻辑的
    public function dologin(Request $request)
    {
        //1. 获取用户提交过来的登录数据

        $input = $request->except('_token');


        //2. 验证数据的有效性
        //Validator::make('要验证的数据','验证规则','提示信息')
        $rule = [
            'name'=>'required|between:5,18',
            'password'=>'required|between:5,18|alpha_dash',
        ];

        //提示信息
        $mess = [
            'name.required'=>'用户名不能为空',
            'name.between'=>'用户名的长度必须在5-18位',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码的长度必须在5-18位',
            'password.alpha_dash'=>'密码必须是数字字母下划线',
        ];

        $validator = Validator::make($input, $rule,$mess);
        //dd($validator);
        // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        //验证码
        if(strtolower($input['code']) != strtolower(session('code'))){
            return back()->with('errors','验证码错误');
        }
       
          //3. 判断用户名、密码、验证码的有效性       
          //$input['username']
          $admin = Admin::where('name',$input['name'])->first();
          // dd($admin);
           
          //如果没有此用户，返回没有此用户的错误提示
          if (! $admin) {
              return back()->with('errors','无此用户');
          }

          //密码不正确
          if(Crypt::decrypt($admin->password) != $input['password']){
              return back()->with('errors','密码错误');
          }


          //4. 如果有效就登录到后台，验证失败就返回到添加页面
          //将用户的登录状态保存到session

          Session::put('admin',$admin);

          return redirect('admin/index');

         
     }


      


}
