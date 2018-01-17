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
                              <div class="widget-function am-fr">
                                  <a href="javascript:;" class="am-icon-cog"></a>
                              </div>
                          </div>
                          <div class="widget-body">
                            <form class="am-form">
                                <div class="am-form-group am-form-horizontal">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">标题:</label>
                                    <div class="am-form-group am-u-sm-11">
                                      <input type="text" id="doc-ipt-3" class="am-round" placeholder="设置网站标题"/>
                                    </div>
                                </div>
                                <br>

                                <div class="am-u-sm-15"></div>

                                <div class="am-form-group am-form-horizontal">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">名称:</label>
                                    <div class="am-form-group am-u-sm-11">
                                      <input type="text" id="doc-ipt-3" class="am-round" placeholder="设置网站名称"/>
                                    </div>
                                </div>

                                <div class="am-u-sm-15"></div>

                                <div class="am-form-group am-u-sm-15">
                                  <label class="am-radio-inline">
                                    <input type="radio"  value="input" name="vs" onclick="genre()"> input型数据
                                  </label>
                                  <label class="am-radio-inline">
                                    <input type="radio" value="textarea" name="vs" onclick="genre()"> textarea型数据
                                  </label>
                                  <label class="am-radio-inline">
                                    <input type="radio" value="radio" name="vs" onclick="genre()"> radio型数据
                                  </label>
                                </div>

                                <div class="am-form-group am-form-horizontal" id="genre">
                                  <label for="doc-ipt-3" class="am-u-sm-1 am-form-label">值类型:</label>
                                  <div class="am-form-group am-u-sm-11">
                                    <input type="text" id="doc-ipt-3" class="am-round" placeholder="1开启,0关闭"/>
                                  </div>
                                </div>

                                <div class="am-form-group">
                                  <label for="doc-select-1">下拉多选框</label>
                                  <select id="doc-select-1">
                                    <option value="option1">选项一...</option>
                                    <option value="option2">选项二.....</option>
                                    <option value="option3">选项三........</option>
                                  </select>
                                  <span class="am-form-caret"></span>
                                </div>

                                <div class="am-form-group">
                                  <label for="doc-select-2">多选框</label>
                                  <select multiple class="" id="doc-select-2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                                </div>

                                <div class="am-form-group">
                                  <label for="doc-ta-1">文本域</label>
                                  <textarea class="" rows="5" id="doc-ta-1"></textarea>
                                </div>

                                <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
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
          var v=$('input[name="vs"]:checked').val();
          var genre=document.getElementById('genre');
          if(v=='radio'){
            console.log('正确');
            console.log(genre);
            genre.style.display="none";
          }else{
            console.log('错误');
            console.log(genre);
            genre.style.display="black";
          }
        }
      </script>
@stop
