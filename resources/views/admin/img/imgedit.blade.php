@extends('layouts.admin')

@section('content')
       <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">轮播图表单</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                                        @if (count($errors) > 0)
                                        <center>
                                      <div class="widget-body am-fr">
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
                                        </center>
                                    @endif
                                <form id="art_form" class="am-form tpl-form-line-form" action="{{ url('admin/img/'.$img->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                 {{ method_field('PUT') }}
                                  <div class="am-form-group">
                                        @if(session('msg'))
                                            <h3>{{ session('msg') }}</h3>
                                        @endif
                                    </div>
                                    <div class="am-form-group">
                                    
                                        <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" name="title" placeholder="请输入标题文字" value="{{ $img->title }}">
                                            <small>请填写标题文字最大20字</small>
                                        </div>
                                    </div>
                                     <div class="am-form-group">                          
                                        <label for="user-name" class="am-u-sm-3 am-form-label">外链地址 <span class="tpl-form-line-small-title">Site</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" name="site" placeholder="请输入外链地址" value="{{ $img->site }}">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">轮播图图 <span class="tpl-form-line-small-title">Img</span></label>
                                          
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                     <p><img src="/lunbotu/{{ $img->img }}" id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
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
                                                     //将整个form打包进formDate对象中传到服务器
                                                    // var formData = new FormData($('#art_form')[0]); 
                                                    //只将文件上传打包到formDate对象中传到服务器
                                                    var formData = new FormData();
                                                    formData.append("img", $('#file_upload')[0].files[0]);
                                                    formData.append("_token", '{{csrf_token()}}');                                             
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "/admin/img/upload",
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
                                            <div class="am-form-group">
                                                <div class="am-u-sm-9 am-u-sm-push-3">
                                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                                </div>
                                            </div>
                                        <!-- <input type="submit" value="提交"> -->
                                    </div>



                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

              


            </div>
        </div>
        @stop