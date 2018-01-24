<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />     
	<meta name="apple-mobile-web-app-capable" content="yes" />    
	<meta name="format-detection" content="telephone=no" />    
	<title>微博-个人中心页</title>
	   <link rel="stylesheet" href="/home/info/css/bootstrap.min.css">
	   <link rel="stylesheet" type="text/css" href="/home/info/css/style.css">

	  <link rel="stylesheet" href="/home/report/css/style.css">
    	<link rel="stylesheet" href="/home/report/css/comment.css">
	<script type="text/javascript" src="/home/info/js/snow.js"></script>
	<script type="text/javascript" src="/home/info/js/jquery-1.8.3.min.js"></script>
    


</head>
<body>
	<nav class="navbar  navbar-fixed-top" role="navigation" style="background: #e0620d ;padding-top: 3px;height:50px;">
		<div class="container-fluid" style="background: #fff;"> 
		    <div class="navbar-header ">
		        <span class="navbar-brand " href="#">WEIBO</span>

		        <button type="button" class="navbar-toggle" data-toggle="collapse"
		                data-target="#my-navbar-collapse">
		            <span class="sr-only">切换导航</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        </button>
		    </div>
		     <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		            <input type="text" class="form-control" placeholder="#热门话题#">
		            <i class="glyphicon glyphicon-search btn_search" ></i>
		           <!--  <button type="submit" class="btn btn-default">提交</button> -->
		        </div>
		        
		    </form>
		    
	      <div class="collapse navbar-collapse" id="my-navbar-collapse">
	       
	        <ul class="nav navbar-nav navbar-right" >
	            <li ><a href="#">欢迎你,{{ session('user')->name }} <span></span>&nbsp;&nbsp;</a></li>
	             
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                    设置 <b class="caret"></b>
	                </a>
	                <ul class="dropdown-menu">
	                    <li><a href="#">修改个人信息</a></li>
	                    <li><a href="#">注册</a></li>
	   
	                </ul>
	            </li>
	        </ul>
	        
	      </div>

	 
		</div>
	 <hr style="margin: 0;padding: 0;color:#222;width: 100%">
	</nav>

	
		<div class="row">
			<div class="col-sm-2"></div>

			<div class="col-sm-6 col-xs-12 my_edit" >
				<div class="row" id="edit_form" >
				    <span class="pull-left" style="margin:15px;">编写新鲜事</span>
					<span class="tips pull-right" style="margin:15px;"></span>
			        <form action="{{ url('home/userinfo') }}" method="post" role="form" style="margin-top: 50px;">
			        			{{ csrf_field() }}
			        			<input type="hidden" name="uid" value="{{ session('user')->id }}">
						  <div class="form-group">
							   <div class="col-sm-12">
							  
							    </div>
							    <div class="col-sm-12" style="margin-top: 12px;">
							    <div>
							    	<textarea style="width:600px;height:100px;" type="text" name="content" placeholder="请输入内容"></textarea>
							    	<div class="tpl-form-file-img">
				                                                     <p><img src="/lunbotu/default.jpg" id="img1" alt="上传后显示图片"  style="max-width:50px;max-height:50px;" /></p>
				                                                </div>
								<input type="hidden" size="50" name="art_thumb" id="art_thumb">
                                                        			   	<input id="file_upload" name="pic" type="file" multiple="ture">
							    </div>
							    
								<script type="text/javascript">
						                                    $(function () {
						                                        $("#file_upload").change(function () {
						                                            uploadImage();
						                                        })
						                                    })
						                                    function uploadImage() {
						                                        //  判断是否有选择上传文件
						                                        var imgPath = $("#file_upload").val();
						                                        if (imgPath == "") {
						                                            alert("请选择上传图片！");
						                                            return;
						                                        }
						                                        //判断上传文件的后缀名
						                                        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
						                                        if (strExtension != 'jpg' && strExtension != 'gif'
						                                                && strExtension != 'png' && strExtension != 'bmp') {
						                                            alert("请选择图片文件");
						                                            return;
						                                        }

						                                        //强整个form打包进formDate对象中传到服务器
							//                       var formData = new FormData($('#art_form')[0]);
						                                        var formData = new FormData();
						                                        formData.append("pic", $('#file_upload')[0].files[0]);
						                                        formData.append("_token", '{{csrf_token()}}');
						                                        $.ajax({
						                                            type: "POST",
						                                            url: "/home/user/upload",
						                                            data: formData,
						                                            async:true,
						                                            cache:false,
						                                            contentType: false,
						                                            processData: false,
						                                            success: function(data) {
						                                                $('#img1').attr('src','/'+data);
						                                                $('#art_thumb').val(data);
						                                            },
						                                            error: function(XMLHttpRequest, textStatus, errorThrown) {
						                                                alert("上传失败，请检查网络后重试");
						                                            }
						                                        });
						                                    }
						                                </script>
							    <button id="send" style="float:right;"type="submit">发布</button>
							    </div>
						  </div>
					</form> 
		   		</div>
	            
				@foreach ($info as $k=>$v)
		   		<div class="row item_msg" >
		   			<div class="col-sm-12 col-xs-12 message" >
		   			     <img src="/home/info/img/icon.png" class="col-sm-2 col-xs-2" style="border-radius: 50%">
		   			   
		   			     <div class="col-sm-10 col-xs-10">
		   			        <span style="font-weight: bold;">{{ session('user')->name }}</span>
		   			        <span style="font-weight: bold;">{{ $v->time }}</span>
		   			        <br>
		   			     	<small class="date" style="color:#999"></small>
		   			        <div class="msg_content">{{ $v->content }}
		   			         <img class="mypic" src="/lunbotu/{{ $v->pic }}" >
		   			         </div>
		   			         
						

		   			     </div>
					
		   				 
		   			</div>

		   		</div>
		   		@endforeach
			</div>


			<div class="col-sm-3 col-xs-12 part_right" >
				<div class="row text-center inform">
				    <img src="/home/info/img/icon.png" >
					<h4 style="font-weight: bold;"></h4>
					<div class="col-sm-12 my_inform" >
						<div class="col-sm-4 col-xs-4">
							<div>111</div>
							<div class="sort">关注</div>

						</div>
						<div class="col-sm-4 col-xs-4">
							<div>111</div>
							<div class="sort">粉丝</div>
						</div>
						<div class="col-sm-4 col-xs-4">
							<div>111</div>
							<div class="sort">博客</div>
						</div>
					</div>
				</div>  
			    <div class="row part_hot" >
			    	<div class="col-sm-12">
			    		<span class="pull-left" style="padding: 10px;font-size:16px;font-weight: bold;">热门话题</span>
			    		<span class="pull-right" style="padding: 10px;">换话题</span>
			    	</div>
			    	<hr style="margin: 0;padding: 0;width: 100%">

			    	<div class="col-sm-12 item_hot" >
			    		<span class="pull-left">#英雄联盟s7#</span>
			    	    <span class="pull-right item_num">34.6亿</span>
			    	</div>

			    	<div class="col-sm-12 item_hot" >
			    		<span class="pull-left">#今天霜降#</span>
			    	    <span class="pull-right item_num">2.6亿</span>
			    	</div>

			    	<div class="col-sm-12 item_hot" >
			    		<span class="pull-left">#亚洲新歌榜#</span>
			    	    <span class="pull-right item_num">10.4亿</span>
			    	</div>

			    	<div class="col-sm-12 item_hot" >
			    		<span class="pull-left">#扑通扑通少女心#</span>
			    	    <span class="pull-right item_num">1.5亿</span>
			    	</div>

			    	<div class="col-sm-12 item_hot" >
			    		<span class="pull-left">#突然开心#</span>
			    	    <span class="pull-right item_num">1.1亿</span>
			    	</div>
			    	<hr style="margin: 0;padding: 0;width: 100%">

			    	<div class="col-sm-12 text-center" style="padding: 10px"><a href="#">查看更多</a></div>

			    </div>
	           
			</div>
		</div>
	    
	    
	
    <script src="/home/info/js/jquery-3.1.0.js"></script>
    <script src="/home/info/js/bootstrap.min.js"></script>
    
</body>
</html>