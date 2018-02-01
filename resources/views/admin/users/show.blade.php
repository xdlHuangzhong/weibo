@extends('layouts.admin')
@section('title','个人微博列表')
@section('content')




        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">个人微博列表</div>


                            </div>
                            <div class="widget-body  am-fr">
                            	
                               
                                <div class="am-u-sm-12" style='margin-top:30px' id="tab">
            
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                    

                                        <thead>

                                            <tr align="center">

                                                
                                                <th>用户昵称</th>
                                                <th>微博内容</th>

                                                <th>评论数量</th>
                                                <th>点赞数量</th>
                                                <th>热门</th>
                                                <th>举报</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($res as $k => $v)
                                            <tr class="even gradeC">
                                                <td class="am-text-middle">{{$nickName}}</td>
                                                <td class="am-text-middle">{{$v->content}}</td>

                                                <td class="am-text-middle">{{$v->rnum}}</td>
                                                <td class="am-text-middle">{{$v->pnum}}</td>
                                                <td class="am-text-middle">{{$v->hot == 0 ? '否' : '是'}}</td>
                                                <td class="am-text-middle">{{$v->report == 0 ? '否' : '是'}}</td>
                                                
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                
                                 

                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <div class="page_list" id="fy">
                                             {!! $res->render() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



           	
@stop