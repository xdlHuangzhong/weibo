@extends('layouts.admin')
@section('title','后台管理')
@section('content')    
     <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">文章列表</div>
                            </div>
                            <div class="widget-body  am-fr">

                             
                                

                            <form action="{{ url('admin/friends') }}" method="get">    
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    @if($input)
                                        <input type="text" name="keywords" value="{{ $input['keywords'] }}" class="am-form-field " placeholder="">
                                    @else
                                        <input type="text" name="keywords" value="" class="am-form-field " placeholder="">
                                    @endif
                                        <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit"></button>
          </span>
                                    </div>
                                </div>
                            </form>
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>链接</th>
                                                <th>名称</th>
                                                <th>操作</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeX">
                                                <td>{{ $v->link }}</td>
                                                <td>{{ $v->name }}</td>
                                                <td class="am-text-middle" id="active{{$v->id}}">{{$v->active == 0 ? '正常' : '冻结'}}</td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                    <a class="btn btn-default" onclick="show({{$v->id}})" id="friends{{$v->id}}"><i class="am-icon-pencil"></i>{{$v->active == 1 ? '恢复' : '冻结'}}</a>
                                                        <a href="{{ url('admin/friends/'.$v->id.'/edit') }}">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" onclick="delFriends({{ $v->id }})" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <div class="page_list" id="fy">
                                            @if($input)
                                                    {!! $data->appends(['keywords'=>$input['keywords']])->render() !!}
                                            @else
                                                    {!! $data->render() !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
            function delFriends(id){
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消']
                }, function(){


                    $.post('{{ url('admin/friends/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {


                        if(data.status == 0){
                            layer.msg(data.message, {icon: 6});
                            setTimeout(function(){
                                window.location.href = location.href;
                            },2000);


                        }else{
                            layer.msg(data.message, {icon: 5});


                            setTimeout(function(){
                                window.location.href = location.href;
                            },2000);
                        }


                    })


                }, function(){


                });
            }

            $('.mws-form-message').delay(3000).slideUp(1000);

        //冻结用户
        function show(id){

            layer.confirm('您确定要修改此用户状态吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "get",
                    url: "/admin/friends/"+id,
                    data: {id:id,_token:'{{csrf_token()}}'},
                    
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)
                        //改变用户状态
                        if(data==1){
                            layer.msg('用户已冻结！', {icon: 1});
                            document.getElementById('active'+id).innerHTML = '冻结';
                            document.getElementById('friends'+id).innerHTML = '恢复';
                        }else{
                            layer.msg('用户已恢复！', {icon: 1});
                           document.getElementById('active'+id).innerHTML = '正常';
                            document.getElementById('friends'+id).innerHTML = '冻结';
                        }

                        

                        
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("标签删除失败，请检查网络后重试", {icon:2 ,})  
                    }
                });

                }, function(){
                        
                });
        }
        </script>
@stop
