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
            <h3>登录</h3>
       	  <form action="{{ url('home/login') }}" method="post">
                {{ csrf_field() }}
                <input name="name" type="text" class="kuang_txt" placeholder="用户名">
                <input name="password" type="password" class="kuang_txt" placeholder="密码">
                <div>
               <a href="{{ url('home/forget') }}">忘记密码？</a><input name="" type="checkbox" value="" checked><span>记住我</span> 
                </div>
                <input  type="submit" class="btn_zhuce" value="登录">
                
                </form>
            </div>
        	<div class="bj_right">
            <p>登录开启精彩生活</p>
                <a href="#" class="zhuce_qq">假的</a>
                <a href="#" class="zhuce_wb">也是假的</a>
                <a href="#" class="zhuce_wx">都是假的</a>
                
            
            </div>
        </div>
        <P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;欢迎您登录微博系统</P>
    </div>

</div>
    
</body>
</html>