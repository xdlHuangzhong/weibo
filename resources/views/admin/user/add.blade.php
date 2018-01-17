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

                                <form class="am-form tpl-form-line-form" action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data">
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

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span class="tpl-form-line-small-title">Pic</span></label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                    <img src="" alt="">
                                                </div>
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
    				<i class="am-icon-cloud-upload"></i> 添加头像</button>
                                                <input id="doc-form-file" type="file" name="pic">
                                            </div>

                                        </div>
                                    </div>

                                    

                                   

                                    

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="sbmit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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