<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>后台登录</title>
<link rel="stylesheet" type="text/css" href="/admin/assets/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/admin/assets/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/admin/assets/css/component.css" />
<!--[if IE]>
<script src="/admin/assets/js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>欢迎你</h3>
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
                       
						<form action="{{ url('admin/dologin') }}"  method="post">
							<div class="input_outer">
                                {{ csrf_field() }}
								<span class="u_user"></span>
								<input name="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户" value="{{ old('name') }}">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
                                                                                                    


                            <div class="input_outera">
                                <span class="us_ue"></span>
                                <input style="width:85px" name="code" value="{{ old('code') }}" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"type="text" placeholder="请输入验证码" >
                                                                                                        
                            </div>
                                                                                                    
                            <div class="input_outerd">
                                <a onclick="javascript:re_captcha();">
                                    <img style="border-radius: 50px;height: 100%;width:100%; opacity:0.8; " src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6">
                                </a>
                            </div>

							<div class="mb2"><button class="act-but submit"  style="color: #FFFFFF;width:100%;" type="submit">登录</button></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
                    <script type="text/javascript">
                        function re_captcha() {
                            $url = "{{ URL('/code/captcha') }}";
                            $url = $url + "/" + Math.random();
                            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
                        }
                    </script>
        <script src="/admin/assets/js/TweenLite.min.js"></script>
        <script src="/admin/assets/js/EasePack.min.js"></script>
        <script src="/admin/assets/js/rAF.js"></script>
        <script src="/admin/assets/js/demo-1.js"></script>
    </body>
</html>