@extends('layouts.admin')
@section('title','后台修改管理')
@section('content')

                    <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                    <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">修改链接</div><br>
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
                                    @if(session('msg'))
                                        <h3>{{ session('msg') }}</h3>
                                    @endif
                                </div>
                            </div>
                            <div class="widget-body am-fr">
        
                                <form action="{{ url('/admin/friends/'.$friends->id) }}" method="post" class="am-form tpl-form-line-form">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">链接<span class="tpl-form-line-small-title">Title</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="link" value="{{ $friends->link }}" class="tpl-form-input" id="user-name" placeholder="请修改链接">
                                            
                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">名称<span class="tpl-form-line-small-title">Title</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="name" value="{{ $friends->name }}" class="tpl-form-input" id="user-name" placeholder="请修改网站名称">
                                            
                                        </div>
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