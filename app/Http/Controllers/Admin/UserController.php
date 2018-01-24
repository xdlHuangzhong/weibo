<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//加密的类
use Illuminate\Support\Facades\Crypt;
use Image;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Admin::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $name = $request->input('keywords1');
                $phone = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($name)){
                    $query->where('name','like','%'.$name.'%');
                }
                //如果手机号不为空
                if(!empty($phone)){
                    $query->where('email','like','%'.$phone.'%');
                }
            })
            ->paginate($request->input('num', 2));
        return view('admin.user.list',['data'=>$data, 'request'=> $request]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // 1.接收表单传过来的参数
       $input = $request->except('_token','repassword','picc');

        //2. 验证数据的有效性
        //Validator::make('要验证的数据','验证规则','提示信息')
         $rule = [
           

            'name' => 'required|regex:/^.{4,12}$/',
            'password' => 'required|regex:/^w{6,12}$/',
            'repassword' => 'required|regex:/^\w{6,12}$/',
            'repassword' => 'same:password',
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
            'email'=>'required|email',
            'pic'=>'required'
        ];

        //提示信息
        $mess = [
           

            'name.required' => '*用户名不能为空*',
            'name.regex' => '*请输入4~12位用户名*',
            'password.required' => '*密码不能为空*',
            'password.regex' => '*请输入6~12位密码*',
            'repassword.same' => '*两次密码不一致*',
            'phone.required' => '*手机号码不能为空*',
            'phone.regex' => '*手机号码格式不正确*',
            'email.required'=>'*邮箱不能为空*',
            'email.email'=>'*邮箱不合法*',
            'pic.required' => '*头像不能为空*'
        ];
        $validator = Validator::make($input, $rule,$mess);

        // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/user/create')
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Admin::where('name',$input['name'])->first();
        $admin = Admin::where('email',$input['email'])->first();
        $admin = Admin::where('phone',$input['phone'])->first();
           
          //如果没有此用户，返回没有此用户的错误提示
        if($admin){
          if ($admin->name == $input['name']) {
              return back()->with('errors','此管理员名已存在');
          }
          if ($admin->email == $input['email']) {
              return back()->with('errors','此管理员邮箱已存在');
          }
          if ($admin->phone == $input['phone']) {
              return back()->with('errors','此管理员手机号已存在');
          }
      }

        

        //时间
        $time = date('Y-m-d H:i:s',time());
        $input['created_at'] = $time;
        $input['updated_at'] = $time;

        //执行添加管理员   
        //创建一个空的用户对象
          $admin = new Admin();
          $admin->status = $input['status'];
          $admin->name = $input['name'];
          $admin->password = Crypt::encrypt($input['password']);
          $admin->pic = substr($input['pic'],8); 
          $admin->email = $input['email'];
          $admin->phone = $input['phone'];

          $res = $admin->save();
          //验证
          if($res)
        {
            return redirect('admin/user');
        }else{
            return back();
        }
       

    }


     //图片上传
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
                $path = $file->move(public_path().'/uploads',$newName);
                //返回上传的文件在服务器上的保存路径,给浏览器显示上传图片
                $filepath = 'uploads/'.$newName;
                //返回文件的路径
                return  $filepath;
            }
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
        // return view('admin.user.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);

        $user->password = Crypt::decrypt($user->password);
        
        return view('admin.user.edit',compact('user'));
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
        //获取要修改的id
        $user = Admin::find($id);


         if($request->ypassword){
          if ($request->ypassword != Crypt::decrypt($user->password)) {
              return back()->with('errors','*输入原密码有误*');

          }
          
      }else{
        return back()->with('errors','*原密码不能为空*');
      }

        // 1.接收表单传过来的参数
      
        $input = $request->except('_token','_method','repassword','ypassword','picc');
        // dd($input);
       
       
        //2. 验证数据的有效性
        //Validator::make('要验证的数据','验证规则','提示信息')
        $rule = [
           

            'name' => 'required|regex:/^.{4,12}$/',
            'password' => 'required|regex:/^\w{6,12}$/',
            'repassword' => 'required|regex:/^\w{6,12}$/',
            'repassword' => 'same:password',
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
            'email'=>'required|email',
           
        ];

        //提示信息
        $mess = [
           

            'name.required' => '*用户名不能为空*',
            'name.regex' => '*请输入4~12位用户名*',
            'password.required' => '*密码不能为空*',
            'password.regex' => '*请输入6~12位密码*',
            'repassword.same' => '*两次密码不一致*',
            'phone.required' => '*手机号码不能为空*',
            'phone.regex' => '*手机号码格式不正确*',
            'email.required'=>'*邮箱不能为空*',
            'email.email'=>'*邮箱不合法*',
            
        ];
        $validator = Validator::make($input, $rule,$mess);
        // dd($validator);
        // 如果验证失败
        if ($validator->fails()) {
            return redirect("admin/user/".$id."/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $oldpic = 'uploads/'.$user->pic;
        // dd($oldpic);
        $newpic = $input['pic'];

        if($newpic){
                $input['pic'] = substr($input['pic'],8);
                if(!empty($user->pic)){
                unlink($oldpic);
              }

        }else{
                $input['pic'] = $user->pic;
        }

       

       //加密密码，使用正确文件名
       $input['password'] = Crypt::encrypt($input['password']);
       
       //执行修改
        $res = $user->update($input);

        //判断是否成功
         if($res){
            Session::put('admin',$user);
            return redirect('admin/user');
        }else {
            //如果添加失败，返回到修改页
            return back()->with('msg','修改失败');

        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取要删除的id
        $user = Admin::find($id);
        // dd($user);
        //执行删除
        $res = Admin::find($id)->delete();
        
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

//        return response()->json($data);
//        json_encode($data);
        return $data;
    }
}
