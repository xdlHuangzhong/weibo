	@extends('layouts.admin')
                @section('title','系统消息')
	@section('content')
	<!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">


                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">系统消息</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form" action="{{ url('admin/send/'.$user->uid) }}"  method="post">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">Form：管理员 </label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" disabled="disabled" value="{{ $admin }}">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">To：用户昵称 </label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" disabled="disabled" value="{{ $user->nickName }}">
                                            
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="am-form-group">
                                        <label for="user-intro" class="am-u-sm-12 am-form-label  am-text-left">消息内容</label>
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <textarea class="" rows="10" id="user-intro" name="content" ></textarea>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="time" value="{{time()}}">
                                         {{csrf_field()}}
                                    <div class="am-form-group">
                                        <div class="am-u-sm-12 am-u-sm-push-12">
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