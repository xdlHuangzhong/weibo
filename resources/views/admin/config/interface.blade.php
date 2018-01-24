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
                            <form class="am-form" action="{{url('admin/config')}}" method="post">
                                              {{csrf_field()}}
                                <div class="am-form-group am-form-horizontal  am-u-sm-15">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">标题:</label>
                                  <div class="am-form-group am-u-sm-11">
                                    <input name="title" type="text" id="doc-ipt-3" class="am-round" placeholder="设置标题"/>
                                  </div>
                                </div>

                                <div class="am-form-group am-form-horizontal  am-u-sm-15">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">名称:</label>
                                  <div class="am-form-group am-u-sm-11">
                                    <input name="names" type="text" id="doc-ipt-3" class="am-round" placeholder="设置名称"/>
                                  </div>
                                </div>

                                <div class="am-form-group am-form-horizontal  am-u-sm-15">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">内容:</label>
                                  <div class="am-form-group am-u-sm-11">
                                    <input name="content" type="text" id="doc-ipt-3" class="am-round" placeholder="设置内容"/>
                                  </div>
                                </div>

                                <div class="am-u-sm-15"></div>

                                      <input type="radio"  value="input" name="type" checked onclick="genre()"> input型数据
                                      <input type="radio" value="textarea" name="type" onclick="genre()"> textarea型数据
                                      <input type="radio" value="radio" name="type" onclick="genre()"> radio型数据


                                <div class="am-form-group am-form-horizontal am-u-sm-15" id="genre">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">状态:</label>
                                  <div class="am-form-group am-u-sm-11">
                                    <input name="status" type="text" id="doc-ipt-3" class="am-round" placeholder="1开启,0关闭" value="0">
                                  </div>
                                </div>

                                <div class="am-form-group am-form-horizontal am-u-sm-15">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">排序:</label>
                                  <div class="am-form-group am-u-sm-11">
                                    <input name="order" type="text" id="doc-ipt-3" class="am-round" value="1"/>
                                  </div>
                                </div>

                                <div class="am-u-sm-15"></div>

                                <div class="am-form-group am-form-horizontal">
                                  <textarea name="explain" placeholder="说明" rows="3" id="doc-ta-2s"></textarea>
                                </div>

                                <div class="am-u-sm-centered am-u-sm-4">
                                  <button type="submit" class="am-btn am-btn-default btn-loading-example am-fl">提交</button>
                                  <button type="button" class="am-btn am-btn-default btn-loading-example am-fr" onclick="history.go(-1)">返回</button>
                                </div>

                            </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script type="text/javascript">
        genre();
        function genre(){
          var v=$('input[name="type"]:checked').val();
          var genre=document.getElementById('genre');
          if(v=='radio'){
            genre.style.display="block";
          }else{
            genre.style.display="none";
          }
        }
      </script>
@stop
