@extends('layouts.admin')
              @section('title','网站配置')
@section('content')
<!-- 内容区域 -->
      <div class="tpl-content-wrapper">
          <div class="row-content am-cf">
              <div class="row">
                  <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                      <div class="widget am-cf">
                          <div class="widget-head am-cf">
                              <div class="widget-title am-fl">管理配置</div><br>
                              @if (count($errors) > 0)
                                  <div class="alert alert-danger">
                                      <ul>
                                          @if(is_object($errors))
                                              @foreach ($errors->all() as $error)
                                                  <li style="color:red">{{ $error }}</li>
                                              @endforeach
                                          @else
                                                  <li style="color:red">{{ $errors }}</li>
                                          @endif
                                      </ul>
                                  </div>
                              @endif
                          </div>
                          <div class="widget-body">
                            <form class="am-form" action="{{url('admin/config/update')}}" method="post">
                              {{csrf_field()}}
                              <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-centered">
                              <tr>
                                <th>排序</th>
                                <th>Id</th>
                                <th>标题</th>
                                <th>名称</th>
                                <th>内容</th>
                                <th>说明</th>
                                <th>操作</th>
                              </tr>
                              @foreach($data as $k=>$v)
                              <tr>
                                <td>{{$v->order}}</td>
                                <td>{{$v->id}}</td>
                                <td>{{$v->title}}</td>
                                <td>
                                  <input type="hidden" name="id[]" value="{{$v->id}}">
                                  {{$v->names}}
                                </td>
                                <td>{!! $v->content !!}</td>
                                <td>{{$v->explain}}</td>
                                <td>
                                  <a href="javascript:;" onclick="delUser({{$v->id}})"><i class="am-icon-trash"></i> 删除</a>
                                </td>
                              </tr>
                              @endforeach
                              <td colspan="7">
                                <div class="am-u-sm-centered am-u-sm-4">
                                  <button type="submit" class="am-btn am-btn-primary am-btn-block">提交</button>
                                </div>
                              </td>
                            </table>
                            </form>
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
                  $.post('{{url('admin/config/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
