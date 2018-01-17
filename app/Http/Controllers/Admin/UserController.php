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
       
         // 1. 获取所有的数据，显示到列表中
       // $data = Admin::get();
       // dd($data);

       // return view('admin.user.list',compact('data'));
//        4 多条件
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
       $input = $request->except('_token','repassword');
       

        // dd($input);
        //2. 验证数据的有效性
        //Validator::make('要验证的数据','验证规则','提示信息')

        $rule = [
            'name'=>'required|between:2,18',
            'password'=>'required|between:5,18|alpha_dash',
            'repassword'=>'same:password',
             'phone'=>'required|size:11',
            'email'=>'required|email',
            'pic'=>'image',
        ];

        //提示信息
        $mess = [
           'name.required'=>'用户名不能为空',
            'name.between'=>'用户名必须在2~18位之间',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码必须在5~18位之间',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'确认密码不不一致',
            'phone.required'=>'手机号不能为空',
            'phone.size'=>'手机号必须是11位',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱不合法',
            'pic.image'=>'请上传一张正确的图片'
        ];
        $validator = Validator::make($input, $rule,$mess);
        //dd($validator);
        // 如果验证失败
        if ($validator->fails()) {
            return redirect('admin/user/create')
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Admin::where('name',$input['name'])->first();
        $admin = Admin::where('email',$input['email'])->first();
        $admin = Admin::where('phone',$input['phone'])->first();
          // dd($admin);
           
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

        //处理上传

        if($request->hasFile('pic'))
        {
            $file = $request->file('pic');
            if($file->isValid())
            {
                //处理
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(10000,99999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                if($res){
                    $input['pic'] = $filename;
                }else{
                    $input['pic'] = 'default.jpg';
                }
            }else{
                $input['pic'] = 'default.jpg';
            }
        
        }else{
            $input['pic'] = 'default.jpg';
        }
       

        // dd($input);  

        //时间
        $time = date('Y-m-d H:i:s',time());
        $input['created_at'] = $time;
        $input['updated_at'] = $time;
        // dd($input);
        //执行添加管理员   
        //            创建一个空的用户对象
          $admin = new Admin();
          $admin->status = $input['status'];
          $admin->name = $input['name'];
          $admin->password = Crypt::encrypt($input['password']);
          $admin->pic = $input['pic'];
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
        //   $input['password'] = Crypt::encrypt($input['password']);
        // $Admin =Admin::create(['name'=>$input['name'],'password'=>$input['password'],'pic'=>$input['pic'],'email'=>$input['email'],'phone'=>$input['phone']]);

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
        
        $user->password = crypt::decrypt($user->password);
        
        // dd($user);
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
        // dd($request->repassword);

        if($request->password){
          if ($request->password != $request->repassword) {
              return back()->with('errors','输入密码不一致');
          }
          
      }else{
        return back()->with('errors','密码不能为空');
      }

       $input = $request->except('_token','_method','repassword');
       $input['password'] = Crypt::encrypt($input['password']);


        //处理上传
       // 判断是否为空
       if(empty($input['name'] || $input['email'] || $input ['phone']))
       {
         return back()->with('msg','请填写完整的用户信息');
       }
        if($request->hasFile('pic'))
        {
            // dd($input['pic']);
            $file = $request->file('pic');
            if($file->isValid())
            {
                //处理
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(10000,99999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                if($res){
                    $input['pic'] = $filename;
                }else{
                    $input['pic'] = $user->pic;
                }
            }else{
                $input['pic'] = $user->pic;
            }
        
        }else{
            $input['pic'] =$user->pic;
        }

       
        $res = $user->update($input);

        // dd($user);

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
