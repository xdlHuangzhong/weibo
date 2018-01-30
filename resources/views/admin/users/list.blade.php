@extends('layouts.admin')
@section('title','用户列表')
@section('content')


@if(session('msg'))
    <div class="">
            <script type="text/javascript">
                $(function(){
                        layer.msg( "{{session('msg')}}");
                })
            </script>
    </div>
@endif


        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">用户列表</div>


                            </div>
                            <div class="widget-body  am-fr">
                            	
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                   <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p" style="width:100%">
			

                                    <form  action="{{ url('admin/users') }}" method="get">
                                        <table >
                                            
                                            
                                                
                                                <th><input type="text" name="search" value="{{$request['search']}}" placeholder="用户名" class="am-form-field " style="width:200px;" ></th>
                                                
                                                 
                                                <th><span class="am-input-group-btn">
                                                <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit">
                                                </button>
                                                </span></th>
                                                
                                           
                                        </table>                                            
                                    </form>

                                    </div>
          	             </div>
                                <div class="am-u-sm-12" style='margin-top:30px'>
            
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                    

                                        <thead>

                                            <tr align="center">

                                                
                                                <th>昵称</th>
                                                <th>头像</th>
                                                <th>性别</th>
                                                <th>年龄</th>
                                                <th>邮箱</th>

                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="even gradeC">
                                            <td class="am-text-middle">{{ $v->nickName }}</td>
                                             <td >
                                                    <img src="/lunbotu/{{ $v->pic }}" class="tpl-table-line-img" alt="" style="width:50px;">
                                                </td>
                                                <td class="am-text-middle">{{ $v->sex }}</td>
                                                <td class="am-text-middle">{{ $v->age }}</td>
                                                <td class="am-text-middle">{{ $v->email }}</td>

                                                <td class="am-text-middle" id="status{{$v->uid}}">{{$v->active == 0 ? '冻结' : '正常'}}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                    
                                                        
                                                        
                                                        

                                                        <a  href="{{ url('admin/users/'.$v->uid) }}" disabled="disabled">
                                                             查看微博
                                                        </a>

                                                        <a  href="{{ url('/admin/news/'.$v->uid) }}" disabled="disabled">
                                                             系统消息
                                                        </a>
                                                       
                                                        <a class="btn btn-default" onclick="user_edit({{$v->uid}})" id="user{{$v->uid}}">{{$v->active == 1 ? '冻结' : '恢复'}}</a>


                                                        


                                                        
                                                        
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- more data -->
                                        </tbody>
                                    </table>

                                </div>
                                
                                 

                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <div class="page_list" id="fy">
                                            {!! $data->appends($request->all())->render() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">

        $('.mws-form-message').delay(3000).slideUp(1000);

        //冻结用户
        function user_edit(id){

            layer.confirm('您确定要修改此用户状态吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/users/"+id,
                    data: {id:id,_token:'{{csrf_token()}}',_method:'put'},
                    
                    beforeSend:function(){
                        //加载样式
                        a = layer.load(0, {shade: false});
                      },
                    success: function(data) {

                        //关闭加载样式
                        layer.close(a)

                        //改变用户状态
                        if(data==1){
                            layer.msg('用户已恢复！', {icon: 1})
                            document.getElementById('status'+id).innerHTML = '正常';
                            document.getElementById('user'+id).innerHTML = '冻结';
                        }else{
                            layer.msg('用户已冻结！', {icon: 1});
                           document.getElementById('status'+id).innerHTML = '冻结';
                            document.getElementById('user'+id).innerHTML = '恢复';
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