@extends('layouts.home')
 @section('title','微博')
@section('content')
<div class="WB_main clearfix" id="plc_frame">
				<div class="WB_frame" >
				<!-- 左导 -->
		          <div class="WB_main_l">
		          	<div id="pl_unlogin_home_leftnav"><div class="UG_left_nav" node-type="UG_fixed_nav" style="position: absolute; top: 66px;">
	<ul>
					            <div category_id="0" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:0" suda-uatrack="key=www_unlogin_home&amp;value=recommend" style="margin-top:20px">
                <li>
                    <a href="{{url('home/index')}}" class="nav_item cur">全部</a>
                </li>
                <li>
                    <a href="{{url('home/hot')}}" class="nav_item cur">热门</a>
                </li>
                
            </div>
					            
					           
			</ul>
</div></div>
		          </div>
          		<!-- ／左导 -->
		          <div id="plc_main">
		          	<div id="plc_unlogin_home_main"><div class="WB_frame_c">
    <div id="pl_unlogin_home_feed">    <!--榜单栏位置-->
                    <!--/ card-->
        <div class="UG_slider">

            <div class="myFocus-box">
                <div id="myFocus" style="width:100%;">
                    <div class="loading" ><span>正在载入...</span></div><!--载入画面-->
                    <ul class="pic"><!--内容列表-->
                        @if($bata)
                            @foreach ($bata as $f)
                                <li><a href="https://{{ $f->site }}"><img src="/lunbotu/{{ $f->img }}" thumb="" alt="" text="" /></a></li>
                            @endforeach
                        @endif

                    </ul>
                </div>

            </div>
        </div>
<!-- card -->
             @foreach($user as $k=>$v)

        <div class="UG_contents" id="PCD_pictext_i_v5">
            <!--feed内容-->
                    <ul class="pt_ul clearfix" pagenum="" node-type="feed_list">
          <div class="UG_list_b" mid="4193931174309006" action-type="feed_list_item" href="//weibo.com/1711684227/FDpzTi4Y6?ref=feedsdk" suda="key=nologin_home&amp;value=nologin_card_weibo:4193931174309006" suda-uatrack="key=www_unlogin_home&amp;value=recommend_feed">

                        <div class="list_des">

                            <div class="subinfo_box clearfix">

                                <a href="#" target="_blank">
                                    <span class="subinfo_face ">
                                        <img src="/lunbotu/{{$v->pic}}" alt="" width="65" height="65">
                                    </span>
                                </a>




                                <a href="#" target="_blank">
                                    <span class="subinfo S_txt2" style="font-size:24px;">{{$v->nickName}}</span>
                                </a>




                            </div>
                        </div>
                    </div>
                </ul>
                <!--/feed内容-->
        </div>
        @endforeach
    </div>
</div>

<div class="WB_main_r" fixed-box="true">
    <div id="pl_unlogin_home_login"><div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; width: 340px;">
<div style="height:1px;margin-top:-1px;visibility:hidden;"></div></div>
<div class="bg" node-type="qr_help" style="position: absolute; top: 2px; left: -220px; width: 264px; height: 372px; background-position: -300px -150px; background-repeat: no-repeat; z-index: 999; background-image: url(&quot;sprite_login.png&quot;); display: none;"></div></div>
    <div id="pl_unlogin_home_adcontent"></div>
    <div id="pl_unlogin_home_hots">
<div class="UG_box_l">
    <!--微博实时热点-->
    <h2 class="UG_box_title">系统公告</h2>
    <div class="UG_contents">
                <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/e554a6e1eca5d7bd_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot05">
            @foreach ($date as $not)
            <div class="pic W_piccut_v">
                <a href="javascript:;" target="_blank"><img src="/noticepic/{{ $not->logo }}" alt=""></a>
            </div>
            <div class="list_des">
                <h2 class="list_title_s"><a href="https://{{ $not->content }}" class="S_txt1" target="_blank">{{ $not->name }}</a></h2>

            </div>
            @endforeach
        </div>
            </div>
    
</div>
</div>
    <div id="pl_unlogin_home_hotsearchkeywords"></div>
    <div id="pl_unlogin_home_hotpersoncategory"><div class="UG_box_l">
  <h2 class="UG_box_title">微博找人</h2>
  <div class="UG_contents">
    <div class="UG_tag_list">
      <h3 class="tag_title">工作</h3>
      <ul class="clearfix">
          @foreach($cate as $k=>$v)
                                  <li><a class="S_txt1"  href="{{ url('/home/usercate/'.$v->name) }}"><i class="item_icon"><img src="/home/shouye/img/1087030002_892_1003_0.png" class="pic"></i><span class="text width_fix W_autocut">{{ $v->name }}</span></a></li>

          @endforeach
                </ul>
    </div>


     
  </div>
</div></div>
</div>
</div>
		          </div>
				</div>

      <a class="W_gotop S_ficon_bg" id="base_scrollToTop" href="javascript:" style="visibility: visible; transform: translateZ(0px); position: fixed; bottom: 40px; top: auto;"><em class="W_ficon ficon_backtop S_bg2_c">Ú</em></a>
            <a class="W_gotop S_ficon_bg  U_reload" id="base_reload" href="javascript:" style="visibility: visible; transform: translateZ(0px); position: fixed; bottom: 90px; top: auto;"><em class="W_ficon ficon_reload S_bg2_c">ù</em></a>
      		</div>
@stop
