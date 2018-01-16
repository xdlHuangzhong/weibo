@extends('layouts.admin')
@section('title','后台公告修改')
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

                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('admin/notice/'.$notice->id) }}" method="post" >
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
                            <input name="name" type="text" class="tpl-form-input" id="user-name" value="{{ $notice->name }}">
                            <small>请填写标题文字10-20字左右。</small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">Logo <span class="tpl-form-line-small-title">Images</span></label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                    <img src="assets/img/a5.png" alt="">
                                </div>
                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                <input id="doc-form-file" type="file" multiple="">
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
                            <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop