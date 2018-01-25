@extends('layouts.admin')
@section('title','热门话题管理')
@section('content')    
     <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">热门话题</div>
                            </div>
                            <div class="widget-body  am-fr">

                             
                                

                            <form action="{{ url('admin/topic') }}" method="get">    
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">

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
                                                <th>热门话题链接</th>
                                                <th>热门话题名称</th>
                                                <th>操作</th>




                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="gradeX">

                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="{{ url('admin/topic/'.$v->id.'/edit') }}">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" onclick="deltopic({{ $v->id }})" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                         
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <div class="page_list" id="fy">

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
