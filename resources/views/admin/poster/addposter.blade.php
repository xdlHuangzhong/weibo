@extends('layouts.admin')
@section('title','广告管理')
@section('content')

                    <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                    <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">广告链接添加</div><br>
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
        
                                <form action="/admin/poster" method="post" class="am-form tpl-form-line-form">
                                {{ csrf_field() }}
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">广告链接<span class="tpl-form-line-small-title">Link</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="link" class="tpl-form-input" id="user-name" placeholder="请输入广告链接">
                                            
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">广告图片 <span class="tpl-form-line-small-title">Img</span></label>
                                          
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                     <p><img src="/guanggao/default.jpg" id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                                                </div>
                                                        <input type="hidden" size="50" name="art_thumb" id="art_thumb">
                                                        <input id="file_upload" name="img" type="file" multiple="false">  <!-- multiple多文件上传开关 -->
                                                                  <button type="button" class="am-btn am-btn-danger am-btn-sm"><i class="am-icon-cloud-upload"></i> 添加图片</button>                       
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

                                        //强整个form打包进formDate对象中传到服务器
//                                        var formData = new FormData($('#art_form')[0]);
                                        var formData = new FormData();
                                        formData.append("img", $('#file_upload')[0].files[0]);
                                        formData.append("_token", '{{csrf_token()}}');
                                        $.ajax({
                                            type: "POST",
                                            url: "/admin/poster/upload",
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

                                    </div>
                                   
                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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