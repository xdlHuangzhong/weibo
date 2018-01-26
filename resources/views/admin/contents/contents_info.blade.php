@extends('layouts.admin')

@section('content')
       <div class="tpl-content-wrapper">


            <div class="row-content am-cf">


                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">微博内容详情</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            
                                      
                                <form id="art_form" class="am-form tpl-form-line-form" action="" method="post" enctype="multipart/form-data">
                                       <div class="am-form-group">
                                            <label for="user-phone" class="am-u-sm-3 am-form-label">发布者 <span class="tpl-form-line-small-title">Bank</span></label>
                                            <div class="am-u-sm-9">
                                                <input name="cid" type="text" class="tpl-form-input" id="user-name" value="{{$nickName}}" readonly="readonly">

                                            </div>
                                        </div>
                                    
                                     
                                   <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">发布时间 <span class="tpl-form-line-small-title">Time</span></label>
                                        <div class="am-u-sm-9">
                                            <input name="time" type="text" class="tpl-form-input" id="user-name" value="{{$res->time}}" readonly="readonly">
                                        </div>
                                    </div>
                                       
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label"> 图片<span class="tpl-form-line-small-title"> Img</span></label>
                                          
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                     <p><img src="/lunbotu/{{$res->pic}}" id="img1" alt=""  style="max-width:350px;max-height:100px;"  /></p>
                                                </div>                                                         
                                        </div>
                                        </div>
                                                <div class="am-form-group">
                                                    <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容<span class="tpl-form-line-small-title"> Content</span></label>

                                                    <div class="am-u-sm-9">
                                                        <textarea name="content" class="" rows="10" id="user-intro" readonly="readonly" >{{$res->content}}</textarea>
                                                    </div>
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