@extends('layouts.admin')
                @section('title','修改普通用户信息')
	@section('content')
	<!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">


                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">管理员修改</div><br>
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
                                    @if(session('msg'))
                                      <h3>{{ session('msg') }}</h3>
                                  @endif
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-line-form" action="{{ url('admin/users/'.$users->id) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
                             {{--生成提交方式--}}
                    <input type="hidden" name="_method" value="PUT">
                                    {{ method_field('PUT') }}
                                    <div class="am-form-group">
                                    
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名 <span class="tpl-form-line-small-title">Name</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="name" class="tpl-form-input" id="user-name" placeholder="请输入标题文字" value="{{ $users->name }}" readonly="readonly">
                                            
                                        </div>
                                    </div>





                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">父级分类 <span class="tpl-form-line-small-title">Author</span></label>
                                        <td class="am-text-middle">{{ $users->phone }}</td>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="{searchBox: 1}" name="cate_id" style="display: none;" >
                                                <option value="">--请选择分类--</option>
                                                @foreach($catone as $k=>$v)
                                                    <option value="{{ $v->id }}">{{ $v->name }}</option>

                                                @endforeach
                                            </select>

                                        </div>

                                    </div>



                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
	@stop