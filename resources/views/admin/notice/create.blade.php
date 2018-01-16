@extends('layouts.admin')
@section('title','后台管理')
@section('content')
<div class="row">

    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
        <div class="widget am-cf">
            <div class="widget-head am-cf">
                <div class="widget-title am-fl"></div>
                <div class="widget-function am-fr">
                    <a href="javascript:;" class="am-icon-cog"></a>
                </div>
            </div>
            <div class="widget-body am-fr">

                <form id="art_form" class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('admin/notice') }}" method="post" >
                    {{ csrf_field() }}
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                        <div class="am-u-sm-9">
                            <input name="name" type="text" class="tpl-form-input" id="user-name" placeholder="请输入标题文字">

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">发布时间 <span class="tpl-form-line-small-title">Time</span></label>
                        <div class="am-u-sm-9">
                            {{--<input name="time" type="text" class="am-form-field tpl-form-no-bg" placeholder="发布时间" data-am-datepicker="" readonly="">--}}
                            <input name="time" type="text" class="tpl-form-input" id="user-name" value="{{ date('Y-m-d H:i:s') }}" readonly="readonly">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">发布者 <span class="tpl-form-line-small-title">Bank</span></label>
                        <div class="am-u-sm-9">
                            <input name="bank" type="text" class="tpl-form-input" id="user-name" value="{{ session('admin')->name }}" readonly="readonly">

                        </div>
                    </div>

                {{--图片上传--}}
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">Logo <span class="tpl-form-line-small-title">Images</span></label>

                    <div class="am-u-sm-9">
                        <div class="am-form-group am-form-file">
                            <div class="tpl-form-file-img">
                                <p><img src="/noticepic/1.jpg" id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                            </div>

                            {{--<input type="text" size="50" name="art_thumb" id="art_thumb" >--}}
                            <!-- multiple多文件上传开关 -->
                            <input id="file_upload" name="logo" type="file" multiple="false" >
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
                                    var formData = new FormData($('#art_form')[0]);
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/notice/upload",
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
                        <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容</label>
                        <div class="am-u-sm-9">
                            <textarea name="content" class="" rows="10" id="user-intro" placeholder="请输入文章内容"></textarea>
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

@stop