@extends('layouts.home')
 @section('title','微博')
@section('content')
<div class="WB_main clearfix" id="plc_frame">
				<div class="WB_frame">
				<!-- 左导 -->
		          <div class="WB_main_l">
		          	<div id="pl_unlogin_home_leftnav"><div class="UG_left_nav" node-type="UG_fixed_nav" style="position: absolute; top: 66px;">
	<ul>
					            <div category_id="0" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:0" suda-uatrack="key=www_unlogin_home&amp;value=recommend">
                <li>
                    <a href="https://weibo.com/?category=0" class="nav_item cur">热门</a>
                </li>
            </div>
					            <div category_id="2" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:2" suda-uatrack="key=www_unlogin_home&amp;value=star">
                <li>
                    <a href="https://weibo.com/?category=2" class="nav_item">明星</a>
                </li>
            </div>
					            <div category_id="1760" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:1760" suda-uatrack="key=www_unlogin_home&amp;value=headline">
                <li>
                    <a href="https://weibo.com/?category=1760" class="nav_item">头条</a>
                </li>
            </div>
					            <div category_id="video" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:video" suda-uatrack="key=www_unlogin_home&amp;value=video">
                <li>
                    <a href="http://krcom.cn/" class="nav_item">视频</a>
                </li>
            </div>
					            <div category_id="novelty" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:novelty" suda-uatrack="key=www_unlogin_home&amp;value=novelty">
                <li>
                    <a href="https://weibo.com/?category=novelty" class="nav_item">新鲜事</a>
                </li>
            </div>
					            <div category_id="99991" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:99991" suda-uatrack="key=www_unlogin_home&amp;value=billboard">
                <li>
                    <a href="https://weibo.com/?category=99991" class="nav_item">榜单</a>
                </li>
            </div>
					            <div category_id="10011" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:10011" suda-uatrack="key=www_unlogin_home&amp;value=fun">
                <li>
                    <a href="https://weibo.com/?category=10011" class="nav_item">搞笑</a>
                </li>
            </div>
					            <div category_id="7" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:7" suda-uatrack="key=www_unlogin_home&amp;value=society">
                <li>
                    <a href="https://weibo.com/?category=7" class="nav_item">社会</a>
                </li>
            </div>
					            <div category_id="10010" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:10010" suda-uatrack="key=www_unlogin_home&amp;value=emotion">
                <li>
                    <a href="https://weibo.com/?category=10010" class="nav_item">情感</a>
                </li>
            </div>
					            <div category_id="12" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:12" suda-uatrack="key=www_unlogin_home&amp;value=fashion">
                <li>
                    <a href="https://weibo.com/?category=12" class="nav_item">时尚</a>
                </li>
            </div>
					            <div category_id="4" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:4" suda-uatrack="key=www_unlogin_home&amp;value=mil">
                <li>
                    <a href="https://weibo.com/?category=4" class="nav_item">军事</a>
                </li>
            </div>
					            <div category_id="10007" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:10007" suda-uatrack="key=www_unlogin_home&amp;value=beauty">
                <li>
                    <a href="https://weibo.com/?category=10007" class="nav_item">美女</a>
                </li>
            </div>
					            <div category_id="3" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:3" suda-uatrack="key=www_unlogin_home&amp;value=sports">
                <li>
                    <a href="https://weibo.com/?category=3" class="nav_item">体育</a>
                </li>
            </div>
					            <div category_id="10005" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:10005" suda-uatrack="key=www_unlogin_home&amp;value=comic">
                <li>
                    <a href="https://weibo.com/?category=10005" class="nav_item">动漫</a>
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
    <div id="myFocus">
        <div class="loading"><span>正在载入...</span></div><!--载入画面-->
        <ul class="pic"><!--内容列表-->
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/1.jpg" thumb="" alt="模板网" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/2.jpg" thumb="" alt="我爱模板网" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/3.jpg" thumb="" alt="网站模板素材" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/4.jpg" thumb="" alt="免费网站模板下载" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/1.jpg" thumb="" alt="网站PSD模板" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/2.jpg" thumb="" alt="网站模板" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/3.jpg" thumb="" alt="免费模板" text="" /></a></li>
            <li><a href="http://www.5imoban.net/"><img src="/home/shouye/img/images/4.jpg" thumb="" alt="jQuery特效代码" text="" /></a></li>
        </ul>
    </div>
    <div class="ad">
        <span>新闻热题</span><br>
        <span>新闻热题</span><br>
        <span>新闻热题</span><br>
        <span>新闻热题</span><br>
        <span>新闻热题</span><br>

    </div>

</div>
</div>
<!-- card -->     
            <div class="UG_tips" action-type="unread_feed_tip" style="display: none;">您有未读内容，点击查看<em class="W_ficon ficon_close S_ficon">X</em></div>
        
        <div class="UG_contents" id="PCD_pictext_i_v5">
            <!--feed内容-->
                    <ul class="pt_ul clearfix" pagenum="" node-type="feed_list">
          <div class="UG_list_b" mid="4193931174309006" action-type="feed_list_item" href="//weibo.com/1711684227/FDpzTi4Y6?ref=feedsdk" suda="key=nologin_home&amp;value=nologin_card_weibo:4193931174309006" suda-uatrack="key=www_unlogin_home&amp;value=recommend_feed">
                        <div class="pic W_piccut_v">
                                                        <img src="/home/shouye/img/66063a83gy1fn97enyc7yj20ul0uln24.jpg" alt="">
                        </div>
                        <div class="list_des">
                            <h3 class="list_title_s">
                                <div>各位哥哥姐姐叔叔阿姨，我叫李奕霆，已經三個月大了，我現在開始會笑和說寶寶話，我長大了以後一定會孝順爸爸媽媽和帶他們去旅遊和吃好吃的！<img class="W_img_face" render="ext" src="/home/shouye/img/sun.gif" title="[太阳]" alt="[太阳]" type="face"><img class="W_img_face" render="ext" src="/home/shouye/img/panda_org.gif" title="[熊猫]" alt="[熊猫]" type="face"><img class="W_img_face" render="ext" src="/home/shouye/img/zy_org.gif" title="[挤眼]" alt="[挤眼]" type="face"> <a target="_blank" render="ext" suda-uatrack="key=topic_click&amp;value=click_topic" class="a_topic" extra-data="type=topic" href="https://huati.weibo.com/k/%E6%9D%8E%E5%A5%95%E9%9C%86?from=501">#李奕霆#</a> ​​​​</div>
                            </h3>
                            <div class="subinfo_box clearfix">
                                <a href="https://weibo.com/huxinger?from=feed&amp;loc=nickname" target="_blank"><span class="subinfo_face "><img src="/home/shouye/img/66063a83jw8fc7ult6h1dj20e60e8aat.jpg" alt="" width="20" height="20"></span></a>
                                <a href="https://weibo.com/huxinger?from=feed&amp;loc=nickname" target="_blank"><span class="subinfo S_txt2">胡杏儿</span></a>
                                <span class="subinfo S_txt2">1月8日 14:56</span>
                                <span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_praised S_ficon W_f16">ñ</em><em>204967</em></span>
                                <span class="rgt_line W_fr"></span>
                                <span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_repeat S_ficon W_f16"></em><em>12375</em></span>
                                <span class="rgt_line W_fr"></span>
                                <span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_forward S_ficon W_f16"></em><em>3266</em></span>
                            </div>
                        </div>
                    </div>
                                                            <!--article feed-->
		<div class="UG_list_b" mid="1022:2309404194062881189781" action-type="feed_list_item" href="https://weibo.com/ttarticle/p/show?id=2309404194062881189781" suda="key=nologin_home&amp;value=nologin_card_weibo:1022:2309404194062881189781" suda-uatrack="key=www_unlogin_home&amp;value=recommend_feed">
			<div class="pic W_piccut_v">
				<img src="/home/shouye/img/005tU8EUgy1fn9mkh6gxnj30c01be7db.jpg" alt="">
			</div>
			<div class="list_des">
				<h3 class="list_title_b"><a href="https://weibo.com/ttarticle/p/show?id=2309404194062881189781" class="S_txt1" target="_blank">其实，李小璐什么都知道</a></h3>
				<div class="subinfo_box clearfix">
					<a href="https://weibo.com/n/%E5%BF%83%E7%81%B5%E9%B8%A1%E6%B1%A4%E8%AF%AD%E5%BD%95%E6%A6%9C" suda-data="key=nologin_home&amp;value=nologin_card_profile:1022:2309404194062881189781" target="_blank"><span class="subinfo_face "><img src="/home/shouye/img/005tU8EUly8fjfnqtqgbaj30ku0kft9x.jpg" alt="" width="20" height="20"></span></a>
					<a href="https://weibo.com/n/%E5%BF%83%E7%81%B5%E9%B8%A1%E6%B1%A4%E8%AF%AD%E5%BD%95%E6%A6%9C" suda-data="key=nologin_home&amp;value=nologin_card_profile:1022:2309404194062881189781" target="_blank"><span class="subinfo S_txt2">心灵鸡汤语录榜</span></a>
					<span class="subinfo S_txt2">1月8日 23:39</span>
					<span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_praised S_ficon W_f16">ñ</em><em>118</em></span>
					<span class="rgt_line W_fr"></span>
					<span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_repeat S_ficon W_f16"></em><em>13</em></span>
					<span class="rgt_line W_fr"></span>
					<span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_forward S_ficon W_f16"></em><em>7</em></span>
				</div>
			</div>
		</div>
	
                                                                               
                                                                                        
                                                                        
                                                                      
                                                                                            
                                                                                        
                                                                        
                                                                                            
                                            <!-- read_pos -->
        <!--/read_pos-->
<div class="UG_tips" node-type="template_loading" action-type="loadingMore"> <div class="WB_empty" action-data="page_id=v6_content_home"> <div class="WB_innerwrap"> <div class="empty_con clearfix"> <p class="text"><i class="W_loading"></i>正在加载中，请稍候...</p> </div> </div> </div> </div></ul>
                <!--/feed内容-->
        </div>
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
    <h2 class="UG_box_title">微博实时热点</h2>
    <div class="UG_contents">
                <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/e554a6e1eca5d7bd_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot05">
            <div class="pic W_piccut_v">
                <a href="https://weibo.com/a/hot/e554a6e1eca5d7bd_0.html?type=grab" target="_blank"><img src="/home/shouye/img/65b2f222ly1fna39yeug1j20sf0zpq8d.jpg" alt=""></a>
            </div>
            <div class="list_des">
                <h3 class="list_title_s"><a href="https://weibo.com/a/hot/e554a6e1eca5d7bd_0.html?type=grab" class="S_txt1" target="_blank">王思聪 回应</a></h3>
                <div class="des_main S_txt2"> ​​​​</div>
            </div>
        </div>
            </div>
    <div class="UG_box_foot">
        <a href="https://weibo.com/a/hot/realtime" class="S_txt1" target="_blank">查看更多<i class="W_ficon ficon_arrow_right S_ficon"></i></a>
    </div>
</div>
</div>
    <div id="pl_unlogin_home_hotsearchkeywords"></div>
    <div id="pl_unlogin_home_hotpersoncategory"><div class="UG_box_l">
  <h2 class="UG_box_title">微博找人</h2>
  <div class="UG_contents">
    <div class="UG_tag_list">
      <h3 class="tag_title">名人</h3>
      <ul class="clearfix">
                                  <li><a class="S_txt1" target="_blank" suda-uatrack="key=nologin_home&amp;value=nologin_famous" href="https://d.weibo.com/1087030002_2975_1003_0"><i class="item_icon"><img src="/home/shouye/img/1087030002_892_1003_0.png" class="pic"></i><span class="text width_fix W_autocut">明星</span></a></li>
                       
                </ul>
    </div>
    <div class="UG_tag_list">
      <h3 class="tag_title">专家</h3>
      <ul class="clearfix">
                        <li><a class="S_txt1" target="_blank" suda-uatrack="key=nologin_home&amp;value=nologin_expert" href="https://d.weibo.com/1087030002_2975_2017_0"><i class="item_icon"><img src="/home/shouye/img/1087030002_558_3_2017.png" class="pic"></i><span class="text width_fix W_autocut">医疗</span></a></li>
                        
                </ul>
    </div>
      <div class="UG_tag_list">
          <h3 class="tag_title">兴趣</h3>
          <ul class="clearfix">
                                <li><a class="S_txt1" target="_blank" suda-uatrack="key=nologin_home&amp;value=nologin_expert" href="https://d.weibo.com/1087030002_2975_2025_0"><i class="item_icon"><img src="/home/shouye/img/1087030002_854_2025_0.png" class="pic"></i><span class="text width_fix W_autocut">时尚</span></a></li>
                                
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