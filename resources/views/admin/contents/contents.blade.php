@extends('layouts.admin')
@section('title','轮播图添加')
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
                                            
                                            
                                                
                                                <th><input type="text" name="keywords1" value="{{ $request->keywords1 }}" placeholder="标题名称" class="am-form-field " style="width:200px;" ></th>
                                                
                                                 
                                                <th><span class="am-input-group-btn">
                                                <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit">
                                                </button>
                                                </span></th>
                                                
                                           
                                        </table>                                            
                                    </form>


                                    </div>
                                    
                                </div>

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                               <th>内容表ID</th>
                                               <th>发博人ID</th>
                                               <th>发博标题</th>
                                                <th>发博内容</th>
                                                <th>发博图片</th>
                                                <th>内容时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeX">
                                             <td class="am-text-middle">{{ $v->cid }}</td>    
                                                <td class="am-text-middle">{{ $v->uid }}</td>
                                                <td class="am-text-middle">{{ $v->title }}</td>
                                                <td class="am-text-middle">{{ mb_substr($v->content,0,15,'utf-8').'...' }}</td>  
                                                <td >
                                                    <img src="/lunbotu/default.jpg" class="tpl-table-line-img" alt="" style="width:50px;">
                                                </td>
                                                 <td class="am-text-middle">{{ date('Y-m-d H:i:s') }}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                      <a href="{{ url('admin/content/'.$v->cid.'/edit') }}">
                                                            <i class="am-icon-pencil"></i> 查看
                                                        </a>
                                                        <a href="javascript:;" onclick="delContents({{ $v->cid }})" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 删除
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