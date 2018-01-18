@extends('layouts.admin')
@section('title','后台公告修改')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
<div class="row">

    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
        <div class="widget am-cf">
            <div class="widget-head am-cf">
                <div class="widget-title am-fl">公告修改</div><br>
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


                </div>
            </div>
            <div class="widget-body am-fr">

                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('admin/notice/'.$notice->id) }}" method="post" >
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}




                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                        <div class="am-u-sm-9">
                            <input name="name" type="text" class="tpl-form-input" id="user-name" value="{{ $notice->name }}">
                            <small>请填写标题文字10-20字左右。</small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">Logo缩略图 <span class="tpl-form-line-small-title">Images</span></label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                    <p><img src="/noticepic/{{ $notice->logo }}" id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                                </div>

                                <input type="hidden" size="50" name="art_thumb" id="art_thumb" >
                                {{--<input type="hidden" size="50" name="art_thumb" id="art_thumb" >--}}
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
//                                        var formData = new FormData($('#art_form')[0]);
                                        var formData = new FormData();
                                        formData.append("logo", $('#file_upload')[0].files[0]);
                                        formData.append("_token", '{{csrf_token()}}');
                                        $.ajax({
                                            type: "POST",
                                            url: "/admin/notice/reupload",
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
                                <button type="submit" class="am-btn am-btn-danger am-btn-sm"><i class="am-icon-cloud-upload"></i> 添加新图片</button>

                            </div>
                        </div>
                    </div>



                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容</label>
                        <div class="am-u-sm-9">
                            <textarea name="content" class="" rows="10" id="user-intro" >{{ $notice->content }}</textarea>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop