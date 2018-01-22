	@extends('layouts.admin')
                @section('title','管理员添加')
	@section('content')
	<!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">


                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">管理员添加</div><br>
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
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">


                                <form class="am-form tpl-form-line-form" action="{{ url('admin/user') }}" method="post" >
			{{ csrf_field() }}

                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">权限 <span class="tpl-form-line-small-title">Status</span></label>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" name='status'>
                                              <option value="0">超级管理员</option>
                                              <option value="1">普通管理员</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                    
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名 <span class="tpl-form-line-small-title">Name</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="name" class="tpl-form-input" id="user-name" placeholder="请输入标题文字" >
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">密码 <span class="tpl-form-line-small-title">Pass</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="password" name="password" class="tpl-form-input" id="user-name" placeholder="请输入密码">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">确认密码 <span class="tpl-form-line-small-title">Repass</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="password" name="repassword" class="tpl-form-input" id="user-name" placeholder="请输入确认密码">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">邮		箱 <span class="tpl-form-line-small-title">Email</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="email" class="tpl-form-input" id="user-name" placeholder="请输入邮箱">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">手机号 <span class="tpl-form-line-small-title">Phone</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="phone" class="tpl-form-input" id="user-name" placeholder="请输入手机号">
                                            
                                        </div>
                                    </div>

 {{--图片上传--}}
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span class="tpl-form-line-small-title">Images</span></label>

                    <div class="am-u-sm-9">
                        <div class="am-form-group am-form-file">
                            <div class="tpl-form-file-img">
                                <p><img src="" id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                            </div>

                            <input type="hidden" size="50" name="pic" id="art_thumb" >
                            <!-- multiple多文件上传开关 -->
                            <input id="file_upload" name="picc" type="file" multiple="false" >
                            
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
                                    // var formData = new FormData($('#art_form')[0]);
                                    var formData = new FormData();
                                        formData.append("pic", $('#file_upload')[0].files[0]);
                                        formData.append("_token", '{{csrf_token()}}');
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/user/upload",
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
                            <button type="submit" class="am-btn am-btn-danger am-btn-sm"><i class="am-icon-cloud-upload"></i> 添加图片</button>

                        </div>
                    </div>






                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop