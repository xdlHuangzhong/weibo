@extends('layouts.admin')
@section('title','管理员添加')
@section('content')
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">文章列表</div>


                            </div>
                            <div class="widget-body  am-fr">
                            	
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                   <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p" style="width:100%">
			<!-- <form action='table-list-img.html' method="">
			<table>
                                        <td><input type="text" name="keywords1" class="am-form-field " style="width:200px" placeholder="Name" value=""></td>
			<td><input type="text" name="keywords2" class="am-form-field " style="width:200px" placeholder="手机号码" value=""></td>
                                        <td><span class="am-input-group-btn">
			<button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit">
			</button>
			</span></td>
			</table>
			</form> -->

                                    <form  action="{{ url('admin/user') }}" method="get">
                                        <table >
                                            
                                            
                                                
                                                <th><input type="text" name="keywords1" value="{{ $request->keywords1 }}" placeholder="用户名" class="am-form-field " style="width:200px;" ></th>
                                                
                                                 
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

                                                <th>ID</th>
                                                <th>头像</th>
                                                <th>用户名</th>
                                                <th>邮箱</th>
                                                <th>手机号</th>
                                                <th>时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="even gradeC">
                                            <td class="am-text-middle">{{ $v->id }}</td>
                                             <td >
                                                    <img src="/uploads/{{ $v->pic }}" class="tpl-table-line-img" alt="" style="width:50px;">
                                                </td>
                                                <td class="am-text-middle">{{ $v->name }}</td>
                                                <td class="am-text-middle">{{ $v->email }}</td>
                                                <td class="am-text-middle">{{ $v->phone }}</td>
                                                <td class="am-text-middle">{{ $v->created_at }}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                    
                                                        
                                                        @if( session('admin')->id == $v->id )
                                                        <a  href="{{ url('admin/user/'.$v->id.'/edit') }}" disabled="disabled">
                                                            <i class="am-icon-pencil" ></i> 修改
                                                        </a>
                                                        @endif
                                                        @if(session('admin')->status == 0  )
                                                        <a id="a1" href="javascript:;" onclick="delUser({{ $v->id }})" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                        @endif
                                                       
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


        <script>
            function delUser(id){
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消']
                }, function(){


                    $.post('{{ url('admin/user/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {


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
        </script>
           	
@stop