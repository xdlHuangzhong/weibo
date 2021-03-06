@extends('layouts.admin')
@section('title','分类添加')
@section('content')
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
<div class="row">

    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
        <div class="widget am-cf">

            <div class="widget-head am-cf">
                <div class="widget-title am-fl">分类添加</div><br>
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
                @if(session('msg'))
                    <h3 style="color:red">{{ session('msg') }}</h3>
                @endif
                <div class="widget-function am-fr">


                </div>
            </div>
            <div class="widget-body am-fr">

                <form id="art_form" class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('admin/cate') }}" method="post" >
                    {{ csrf_field() }}


                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">分类名称 <span class="tpl-form-line-small-title">Title</span></label>
                        <div class="am-u-sm-9">
                            <input name="name" type="text" class="tpl-form-input" id="user-name" placeholder="请输入分类名称">

                        </div>
                    </div>



                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">分类介绍 <span class="tpl-form-line-small-title">Bank</span></label>
                        <div class="am-u-sm-9">
                            <input name="title" type="text" class="tpl-form-input" id="user-name" value="" placeholder="请介绍此分类">

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">分类关键字 <span class="tpl-form-line-small-title">Bank</span></label>
                        <div class="am-u-sm-9">
                            <input name="keywords" type="text" class="tpl-form-input" id="user-name" value="" placeholder="请介绍关键字">

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