<!DOCTYPE html>
<html data-scrapbook-source="https://weibo.com/" data-scrapbook-create="20180109025619535">
<head>
<script type="text/javascript" charset="utf-8" async=""></script><script type="text/javascript" charset="utf-8" async=""></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="initial-scale=1,minimum-scale=1">
<meta content="随时随地发现新鲜事！微博带你欣赏世界上每一个精彩瞬间，了解每一个幕后故事。分享你想表达的，让全世界都能听到你的心声！" name="description">
<link rel="mask-icon" sizes="any" href="" color="black">
<meta name="_token" content="{{ csrf_token() }}"/>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<script type="text/javascript"></script>
<title>微博-随时随地发现新鲜事</title>
<link href="/home/shouye/css/frame.css" type="text/css" rel="stylesheet" charset="utf-8">
<link href="/home/shouye/css/login_v5.css" type="text/css" rel="stylesheet" charset="utf-8">
<link href="/home/shouye/css/skin.css" type="text/css" rel="stylesheet" id="skin_style">
    <link rel="stylesheet" href="/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/app.css">
<script type="text/javascript"></script>
<style>#js_style_css_module_global_WB_outframe{height:42px;}

    #qfy ul li{

        float: left;

        border: 1px solid #B0E2FF;
        background-color:93C513;
        width:30px;
        text-align: center;
        font-size: 20px;
        margin-bottom: 5px;

    }
</style>
<style></style><div style="position: absolute; top: -9999px;"><div id="js_style_css_module_global_WB_outframe"></div></div><script charset="gb2312" id="ssoLoginScript" type="text/javascript"></script><style></style>


<script src="/home/shouye/js/myFocus.js" type="text/javascript"></script>
<script src="/home/shouye/js/5imoban.net.js" type="text/javascript"></script>
<link href="/home/shouye/css/css.css" rel="stylesheet" type="text/css" />





</head>


<body class="FRAME_login">
<div class="B_unlog">


    <div class="WB_miniblog">
        <div class="WB_miniblog_fb">
            <div id="weibo_top_public"><!--spec start-->    <!--顶部导航--> 
    <div class="WB_global_nav WB_global_nav_v2 WB_global_nav_alpha " node-type="top_all">
      <div class="gn_header clearfix">
        <div class="gn_logo" node-type="logo" data-logotype="logo" data-logourl="//weibo.com?topnav=1&amp;mod=logo">
            
        </div>
        <div class=" gn_search_v2">


            <form  action="{{ url('home/index') }}" method="get">




                <input node-type="searchInput" autocomplete="off" value="{{ $request->keywords1 }}" class="W_input" name="keywords1" type="text" placeholder="搜索精彩微博">




                <button type="submit" title="搜索" node-type="searchSubmit" suda-uatrack="key=topnav_tab&amp;value=search" target="_top" style="margin-left:100%;width:43.6px;height:30px;margin-top:-1px">搜</button>
            </form>
          

        </div>       

        <div class="gn_position">
          <div class="gn_nav">
              <ul class="gn_nav_list">
                    <li><a href="" class="home S_txt1" suda-uatrack="key=topnav_tab&amp;value=homepage" target="_top"><em class="W_ficon ficon_home S_ficon">E</em><em class="S_txt1">首页</em></a></li>
                            <li><a href="http://krcom.cn/" nm="tv" class="S_txt1" suda-uatrack="key=topnav_tab&amp;value=video"><em class="W_ficon ficon_video_v2 S_ficon">D</em><em class="S_txt1">视频</em></a></li>
                    <li><a href="https://d.weibo.com/?topnav=1&amp;mod=logo" class="S_txt1" suda-uatrack="key=topnav_tab&amp;value=discover" target="_top"><em class="W_ficon ficon_found S_ficon">F</em><em class="S_txt1">发现</em></a></li>
                                        <li><a href="http://game.weibo.com/?topnav=1&amp;mod=logo&amp;wvr=6" nm="game" class="S_txt1" suda-uatrack="key=topnav_tab&amp;value=game" target="_top"><em class="W_ficon ficon_game S_ficon">G</em><em class="S_txt1">游戏</em></a></li>
                                  </ul>
          </div>
          <div class="gn_login">
              <ul class="gn_login_list">
                    <li><a href="{{ url('/home/register/index') }}" class="S_txt1" target="_top">注册</a></li>
                    <li class="W_vline S_line1"></li>
                    <li><a node-type="loginBtn" href="{{ url('/home/login') }}" class="S_txt1" target="_top">登录</a></li>
              </ul>
        </div>
        </div>             
      </div>
    </div>


  
@section('content')


@show
      <div class="WB_footer S_bg2">
        <div class="footer_link clearfix">
          <dl class="list">
            <dt></dt>
            
          </dl>
        </div>
        <div class="other_link S_bg1 clearfix">
           <p class="copy">
              @foreach ($data as $k=>$v)
              @if($v->active == 0)
                <a target="_blank" href="http://{{ $v->link }}" class="S_txt2"><i class="W_icon icon_weibo"></i>{{ $v->name }}</a>
              @else

              @endif
              @endforeach
            </p>

            <p class="company"><span class="copy S_txt2">Copyright © 2009-2018 WEIBO PHP196版权所有</span></p>
        </div>
      </div>
