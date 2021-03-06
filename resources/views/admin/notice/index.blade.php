@extends('layouts.admin')
@section('title','公告列表')
@section('content')
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">公告列表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">

                                    </div>
                                </div>
                                {{--搜索--}}
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <form action="{{ url('admin/notice') }}" method="get">

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



                                <div id="tab" class="am-u-sm-12 tab">
                                    <table  width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">

                                        <thead>
                                            <tr>
                                                <th>公告缩略图</th>
                                                <th>公告标题</th>
                                                <th>公告作者</th>
                                                <th>公告链接</th>
                                                <th>添加日期</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeX">

                                            @foreach($data as $k=>$v)
                                                <td>
                                                    @if($v->logo)
                                                    <img src="/noticepic/{{ $v->logo }}" class="tpl-table-line-img" alt="">
                                                    @endif
                                                </td>
                                                <td class="am-text-middle">{{ $v->name }}</td>
                                                <td class="am-text-middle">{{ $v->bank }}</td>
                                                <td class="am-text-middle">{{ $v->content }}</td>
                                                <td class="am-text-middle">{{ $v->time }}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="{{ url('admin/notice/'.$v->id.'/edit ') }}">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" onclick="delNotice({{ $v->id }})" class="tpl-table-black-operation-del">
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
                                <div class="am-u-lg-12 " >
                                    <div class="am-fr">
                                        <div class="page_list" id="fy">
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

        </div>

        <script>
            function delNotice(id){
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消']
                }, function(){

                    $.post('{{ url('admin/notice/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {

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