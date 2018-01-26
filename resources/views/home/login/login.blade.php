<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	

    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="/home/register/css/login.css">
    <script type="text/javascript" src="/home/register/js/jquery-1.8.0.min.js"></script>
</head>
<body class="login_bj" >
<div class="zhuce_body">
	
    <div class="zhuce_kong login_kuang">
    	<div class="zc">
        	<div class="bj_bai">
              <br>
       	  <form action="{{ url('home/login') }}" method="post">
                {{ csrf_field() }}
                <!-- <input type="hidden" name="uid"> -->
                <input name="name" type="text" class="kuang_txt" placeholder="用户名">
                <input name="password" type="password" class="kuang_txt" placeholder="密码">
                <input name="code" type="text" class="kuang_txt"  placeholder="请输入验证码">
                <div>
                <a href="{{ url('home/forget') }}">忘记密码？</a>
                <a onclick="javascript:re_captcha();">
                <img style="height: 100%;width:100%; opacity:0.8; " src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6">
                </a>
                </div>
                <input  type="submit" class="btn_zhuce" value="登录">
                
                </form>
            </div>
        	<div class="bj_right">
              
            {{--激活成功的提示--}}
            @if (!empty(session('msg')))
                <div class="alert alert-danger">
                    <ul>
                        <li style="color:red">{{ session('msg') }}</li>
                    </ul>
                </div>
            @endif


            
            <p>{{--登录失败的提示--}}
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
            @endif</p>
            <p>登录开启精彩生活</p>
                <a href="#" class="zhuce_qq">假的</a>
                <a href="#" class="zhuce_wb">也是假的</a>
                <a href="#" class="zhuce_wx">都是假的</a>

            </div>

        </div>
        <P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;欢迎您登录微博系统</P>
    </div>
    <script type="text/javascript">
                        function re_captcha() {
                            $url = "{{ URL('/code/captcha') }}";
                            $url = $url + "/" + Math.random();
                            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
                        }
                    </script>
</div>
    
</body>
</html>