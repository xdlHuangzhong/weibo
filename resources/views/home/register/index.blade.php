<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册页面</title>
	<meta name="keywords" content="盒老师">
	<meta name="content" content="盒老师">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="/home/register/css/login.css">
    <script type="text/javascript" src="/home/register/js/jquery.min.js"></script>

</head>
<body class="login_bj" >

<div class="zhuce_body">
	
    <div class="zhuce_kong">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>欢迎注册</h3>
             @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                    <li style="color:red">{{ $error }}</li>
                                @endforeach
                            @else
                                <li style="color:red">{{ $errors }}</li>
                            @endif
                        </ul>
                    </div>
                @endif
       	  	  <form action="{{ url('/home/register/send') }}" method="post">
              {{ csrf_field() }}
                <!-- <input name="uid" type="hidden" value="id"> -->
                <input name="name" type="text" class="kuang_txt phone" placeholder="账号">
                <input name="email" type="email" class="kuang_txt email" placeholder="邮箱">
                <input name="password" type="password" class="kuang_txt possword" placeholder="密码">
                <input name="re-password" type="password" class="kuang_txt possword" placeholder="确认密码">
                
                <div>
               	<input  id="agree" type="checkbox" value=""><span>已阅读并同意<a href="#" target="_blank"><span class="lan">《微博使用协议》</span></a></span>
                </div>
                    <div>
                <button id="sub" type="submit" disabled class="btn_zhuce" >立即注册</button>
                </div>
                </form>
            </div>
        </div>
       
    </div>

</div>
 <script src="/home/register/jQuery/jquery-2.2.3.min.js"></script>
 <script src="/home/register/bootstrap/bootstrap.min.js"></script>
 <script src="/home/register/iCheck/icheck.min.js"></script>
 <script>
        $(function () {
            $("#agree").on('click',function(){
                if($("#sub").attr('disabled'))
                {
                    $("#sub").attr('disabled',false);
                }else{

                    $("#sub").attr('disabled',true);
                    // return 123;
                }
            });
        });


 </script>

</body>
</html>