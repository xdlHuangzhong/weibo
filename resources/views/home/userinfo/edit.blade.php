<!DOCTYPE html>
<html data-scrapbook-source="http://www.my.com/home/details/edit" data-scrapbook-create="20180125035416648">
<head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="UTF-8">
        <meta name="csrf_token" content="JomhiDxTpP1u9VUlJHzYvuGQdNKCVxYrIZWXitYd">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="修改个人信息" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="data:text/html;scrapbook-resource=9,">
        <link rel="stylesheet" href="data:text/css;scrapbook-resource=0,">
        <link rel="stylesheet" href="data:text/css;scrapbook-resource=2,">
        <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript"></script>
        <script type="text/javascript"></script>
        
        <script type="text/javascript"></script>
        <script type="text/javascript"></script><link rel="stylesheet" href="data:text/css;scrapbook-resource=8," id="layui_layer_skinlayercss" style="">
        <title>
            个人信息
        </title>
    <style>
		#a{background: #FF4741;width:auto;height:3px}
		.col-md-12{
			/*border:solid 2px red;*/
			height: 200px;
		}
		.W_nologin_logo_big{
   			height: 72px;
    		margin: 80px auto 0;
    		width: 200px;
    		/*border:solid 2px blue;*/
		}
		#redis{width:300px;margin-top:35px;font-size:36px;font-family:微软雅黑}
		.rr{height: 4px;background:#FFA00A;width:220px}
		.col-sm-2 {font-size:20px;}
		.form-control{height:40px}
		.btn {height:40px}
	</style>
</head>
	
    
    <body style="background: #B4DAF0">
    	<div id="a"></div>
	
    	<div class="container">
    		<div class="row">
	       	<div class="col-md-12" style="background: url(&quot;data:image/jpeg;scrapbook-resource=3,&quot;);">
	        		<div class="W_nologin_logo_big">
		                        <a href="http://www.my.com/home/login" style="text-decoration:none;">
		                        <h1 style="color:white;font-style:oblique"><b>个人信息</b></h1>
		                        </a>
                   		 </div>
	        	</div>
	        	<div class="col-md-12" style="height:700px;background:white;border-radius:10px">
	        		<div class="col-md-12" style="height:130px;">
	        			<div id="redis">个人信息</div>
	        			<div class="rr"></div>
						
	        		</div>
	        		<div class="col-md-12" style="height:360px;">
						<div class="col-md-12" style="height:300px;margin-top: 30px">
							<form class="form-horizontal" action="{{ url('home/userinfo/'.$res->id) }}" method="post" id="forms" enctype="multipart/form-data">

							 {{ csrf_field() }}
                                                                                              {{ method_field('PUT') }}
                                                                            
                                                                                       
							<input type="hidden" name="uid" value="{{ session('user')->id }}">
								  <div class="form-group">
								    <label for="inputphone3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>昵称:</label>
								    <div class="col-sm-4" style="width: 700px;height:40px">
								      <input class="form-control" maxlength="8" placeholder="请输入昵称" name="nickName" id="uname" style="width: 345px;float: left" value="{{ $res->nickName }}" required="" type="text">
								       <span id="spa" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px"></span>
								    </div>
								  </div>
								  <div class="form-group">
								  	<label for="inputphone3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>性别:</label>
                                   
                                        						<label class="radio-inline" style="margin-left:15px">
                                    
									       <input name="sex" id="inlineRadio1" value="{{ $res->sex }}" checked="checked" type="radio"> 男
									</label>
                                   
    									<label class="radio-inline">
    									  <input name="sex" id="inlineRadio2" value="{{ $res->sex }}" type="radio"> 女
    									</label>
                                   
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>年龄:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input class="form-control" id="age" maxlength="3" style="width: 345px;float: left" name="age" value="{{ $res->age }}" required="" type="text">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label" style="margin-right:15px"><span style="color:red;margin-right: 5px;">*</span>工作:</label> 
									
									<select class="form-control" style="width:345px;font-size: 18px" name="work">
    									                                        <option value="{{ $res->work }}" selected="selected">嫖</option>
                                                                                <option value="IT">IT</option>
                                                                                <option value="吃">吃</option>
                                                                                <option value="喝">喝</option>
                                                                                <option value="嫖">嫖</option>
                                                                                <option value="赌">赌</option>
                                        									</select>

								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>邮箱:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input class="form-control" id="email" name="email" placeholder="请输入邮箱" style="width: 345px;float: left" value="{{ $res->email }}" required="" type="text"  readonly="readonly">
								     <div id="spa1" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px">
								     </div>

								    </div>
								  </div>
                                 
                                  
                                     <div class="form-group">
                                         <label for="inputPassword3" class="col-sm-2 control-label" style="margin-top:20px;"><span style="color:red;margin-right: 5px;margin-top:30px;">*</span>头像:</label>
                                    
                                    
                                         <div class="col-sm-4" style="width:150px;">
                                          <img src="/lunbotu/{{ $res->pic }}" style="width:100px;height: 100px;border-radius:50%;border:solid 1px #ABB1BA" id="img1">
                                          <input type="hidden" size="50" name="art_thumb" id="art_thumb">
                                           <input id="file_upload" name="pic" type="file" multiple="false">  <!-- multiple多文件上传开关 -->  
                                         </div>
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
                                                     //将整个form打包进formDate对象中传到服务器
                                                    // var formData = new FormData($('#art_form')[0]); 
                                                    //只将文件上传打包到formDate对象中传到服务器
                                                    var formData = new FormData();
                                                    formData.append("pic", $('#file_upload')[0].files[0]);
                                                    formData.append("_token", '{{csrf_token()}}');                                             
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "/home/userinfo/upload",
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
          
			<div class="form-group" style="margin-top:30px">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input name="" value="" type="hidden">
                                        <input value="保存修改" style="background:#FFA00A;color: white;width:200px;height: 40px;font-size: 18px;border-radius: 6px;text-align:center" id="btn1" type="submit">
			    </div>
			  </div>
							</form>
						</div>
						
					</div>
					
	        	</div>
				
				<!-- 底部 -->
	        	<div class="col-md-12" style="height:50px;margin-top: 30px;text-align: center;">
						<div class="left_link" style="width:500px;float:left;">
                            <span>友情连接：</span>
							                                                            <a href="http://www.baidu.com/" target="_blank" class="S_txt2" style="text-decoration:none;">你猜呀!</a>
                                                    						</div>

						<div class="copy" style="width:200px;float:right;margin-right: 100px">
                        <a href="#" class="S_txt2" style="text-decoration:none;">版权：php196    出品</a>

						</div>
				</div>
       		</div>
    	</div>
      
     <script></script>
    
    



<script data-scrapbook-elem="pageloader">(function(data){var bs2ab=function(bstr){var n=bstr.length,u8ar=new Uint8Array(n);while(n--){u8ar[n]=bstr.charCodeAt(n);}return u8ar.buffer;};var getRes=function(i,t){if(getRes[i]){return getRes[i];}var s=readRes(atob(data[i].d));return getRes[i]=URL.createObjectURL(new Blob([bs2ab(s)],{type:t}));};var readRes=function(s){return s.replace(/\bdata:([^,]+);scrapbook-resource=(\d+),(#[^'")\s]+)?/g,function(m,t,i,h){return getRes(i,t)+(h||'');});};var loadRes=function(node){var o=node.nodeValue,n=readRes(o);if(n!==o){node.nodeValue=n;}};var loadDocRes=function(doc){var e=doc.getElementsByTagName('*');for(var i=0,I=e.length;i<I;i++){if(['style'].indexOf(e[i].nodeName.toLowerCase())!==-1){var c=e[i].childNodes;for(var j=0,J=c.length;j<J;j++){if(c[j].nodeType===3){loadRes(c[j]);}}}var a=e[i].attributes;for(var j=0,J=a.length;j<J;j++){if(['href','src','srcset','style','background','content','poster','data','code','archive'].indexOf(a[j].nodeName)!==-1){loadRes(a[j]);}}}};var s=document.getElementsByTagName('script');s=s[s.length-1];s.parentNode.removeChild(s);loadDocRes(document);})(
);</script>
</body>
</html>