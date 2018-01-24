@extends('layouts.admin')
@section('title','普通用户列表页')
@section('content')
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">用户列表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                                   <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p" style=" width:25%" >


                                       <form action="{{ url('admin/users') }}" method="get" >

                                           <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                               @if($input)
                                                   <input type="text" name="keywords" value="{{  $input['keywords'] }}" class="am-form-field ">
                                               @else
                                                   <input type="text" name="keywords" value="" class="am-form-field ">
                                               @endif
                                               <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit" ></button>
          </span>


                                           </div>
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
                                                <th>时间</th>
                                                <th>分类</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)

                                            {{--{{dd($v)}}--}}
                                            <tr class="even gradeC">
                                            <td class="am-text-middle">{{ $v->id }}</td>
                                             <td >
                                                    <img src="/uploads/{{ $v->pic }}" class="tpl-table-line-img" alt="" style="width:50px;">
                                                </td>
                                                <td class="am-text-middle">{{ $v->name }}</td>
                                                <td class="am-text-middle">{{ $v->email }}</td>
                                                <td class="am-text-middle">{{ $v->created_at }}</td>
                                                <td class="am-text-middle">{{ $v['posts']['name'] }}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                    
                                                        

                                                        <a  href="{{ url('admin/users/'.$v->id.'/edit') }}" disabled="disabled">
                                                            <i class="am-icon-pencil" ></i> 添加分类
                                                        </a>

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

                                    <div class="page_list" id="fy" style="float:right">
                                        @if($input)
                                            {{ $data->appends(['keywords' => $input['keywords']])->render() }}
                                        @else
                                            {{ $data->render() }}
                                        @endif
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