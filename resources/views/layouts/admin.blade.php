<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/admin/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script type="text/javascript" src="{{'/admin/assets/js/jquery.js'}}"></script>
    <script src="/admin/assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/app.css">

    <link rel="stylesheet" type="text/css" href="/admin/upload/Huploadify.css"/>
    <script src="/admin/assets/js/jquery.min.js"></script>
    
    <style>
        #tab table{table-layout:fixed;}
        tbody tr td{width:30em;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
        #fy ul li{

            float: left;


            width:30px;

        }
    </style>



</head>

<body data-type="index">
    <script src="/admin/assets/js/theme.js"></script>
    <div class="am-g tpl-g">
        <!-- 头部 -->
        <header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <h3 style="color: white;font-size: 30px">weibo.com</h3>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                
                <!-- 搜索 -->
                <div class="am-fl tpl-header-search">
                    <form class="tpl-header-search-form" action="javascript:;">
                        <!-- <button class="tpl-header-search-btn am-icon-search"></button>
                        <input class="tpl-header-search-box" type="text" placeholder="搜索内容..."> -->
                    </form>
                </div>
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">

                            <a href="javascript:;">欢迎你, <span>{{ session('admin')->name }}</span> </a>

                        </li>

                       
                        

                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="{{ url('admin/logout') }}">
                                <span class="am-icon-sign-out"></span>
                                退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <!-- 侧边导航栏 -->
        <div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="/uploads/{{ session('admin')->pic}}" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>

                        {{ session('admin')->name }}

          </span>
                    
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">
                

                <li class="sidebar-nav-heading">数据管理</li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 用户管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                    @if(session('admin')->status == 0)
                        <li class="sidebar-nav-link">

                            <a href="{{ url('admin/user/create') }}">

                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 管理员添加
                            </a>
                        </li>
                    @endif
                        <li class="sidebar-nav-link">
                            <a href="{{ url('admin/user') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 管理员列表
                            </a>
                        </li>
                        <li class="sidebar-nav-link">
                            <a href="{{ url('admin/users') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 用户列表
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 公告管理

                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">

                            <a href="{{ url('/admin/notice/create') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 公告添加
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{ url('/admin/notice') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 公告列表
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-nav-link">
                    <a href="javaquery:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 友情链接
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{ url('/admin/friends/create') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加链接
                            </a>
                        </li>
                        <li class="sidebar-nav-link">
                            <a href="{{ url('/admin/friends') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览链接
                            </a>
                        </li>
                         </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 分类管理

                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">

                            <a href="{{ url('/admin/cate/create') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 分类添加
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{ url('/admin/cate') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 分类列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="login.html">
                        <i class="am-icon-key sidebar-nav-link-logo"></i> 登录
                    </a>
                </li>
                
                   
        </div>


        <!-- 内容区域 -->
@section('content')

@show
    </div>
    </div>
    <script src="/admin/assets/js/amazeui.min.js"></script>
    <script src="/admin/assets/js/amazeui.datatables.min.js"></script>
    <script src="/admin/assets/js/dataTables.responsive.min.js"></script>
    <script src="/admin/assets/js/app.js"></script>
    <script src="/layer/layer.js"></script>
    <script src="/upload/jquery.Huploadify.js"></script>

    <script type="text/javascript" src="{{'/admin/assets/js/ch-ui.admin.js'}}"></script>
    <script type="text/javascript" src="{{'/layer/layer.js'}}"></script>
</body>

</html>