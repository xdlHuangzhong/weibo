@extends('layouts.admin')
@section('title','微博列表')
@section('content')
      <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">微博列表</div>


                            </div>
                            <div class="widget-body  am-fr">
                                <!-- 搜索 -->
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                

                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        
                                       
                                           
                                        <form  action="{{ url('admin/content/info') }}" method="get">
                                        <table >
                                            
                                            
                                                
                                                <th><input type="text" name="search" value="{{$request['search']}}" placeholder="大概内容" class="am-form-field " style="width:200px;" ></th>
                                                
                                                 
                                                <th><span class="am-input-group-btn">
                                                <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit">
                                                </button>
                                                </span></th>
                                                
                                           
                                        </table>                                            
                                    </form>


                                    </div>
                                    
                                </div>

                                <div class="am-u-sm-12" id="tab">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="tab">
                                        <thead>
                                            <tr>
                                               
                                               <th>用户昵称</th>
                                               <th>微博内容</th>
                                                <th>发布时间</th>
                                              
                                                <th>转发量</th>
                                           
                                                <th>热门</th>
                                                <th>举报次数</th>
                                                <th>操作</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($resd as $k => $v)
                                            <tr class="gradeX" >
                                             <td class="am-text-middle">{{$v->nickName}}</td>    
                                                <td class="am-text-middle" >{{$v->content}}</td>
                                                <td class="am-text-middle">{{ $v->time }}</td>
                                               
                                                
                                                 <td class="am-text-middle">{{$v->fnum}}</td>
                                                 
                                                 
                                                 <td class="am-text-middle" id="status{{$v->cid}}">{{$v->hot == 0 ? '否' : '是'}}</td>
                                                 <td class="am-text-middle">{{$v->report}}</td>
                                                 

                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                    <a class="btn btn-default" onclick="user_edit({{$v->cid}})" id="user{{$v->cid}}">{{$v->hot == 1 ? '普通' : '热门'}}</a>
                                                      <a href="{{ url('admin/content/'.$v->uid.'/edit') }}">
                                                            查看
                                                        </a>
                                                        <a href="javascript:;" onclick="delContents({{ $v->cid }})" class="tpl-table-black-operation-del">
                                                             删除
                                                        </a>
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
                                            {!! $resd->appends($request->all())->render() !!}
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


                $('.mws-form-message').delay(3000).slideUp(1000);

        //冻结用户
        function user_edit(id){

            layer.confirm('您确定要修改此用户状态吗？', {
                  btn: ['确定','取消'] //按钮
                }, function(){

                    $.ajax({
                    type: "post",
                    url: "/admin/content/"+id,
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
                            layer.msg('用户已冻结！', {icon: 1});
                            document.getElementById('status'+id).innerHTML = '是';
                            document.getElementById('user'+id).innerHTML = '普通';
                        }else{
                            layer.msg('用户已恢复！', {icon: 1});
                           document.getElementById('status'+id).innerHTML = '否';
                            document.getElementById('user'+id).innerHTML = '热门';
                        }

                        

                        
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        layer.msg("标签删除失败，请检查网络后重试", {icon:2 ,})  
                    }
                });

                }, function(){
                        
                });
        }




            function delContents(cid){
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消']
                }, function(){

                    $.post('{{ url('admin/content/') }}/'+cid,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {


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