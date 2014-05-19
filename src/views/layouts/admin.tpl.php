<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @section('head')
    <meta charset="utf-8"/>
    <title><% $this->title %></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    @show
    @section('css')
    <link href="/packages/arx/arxmin/dist/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/packages/arx/arxmin/dist/css/arxmin.css" rel="stylesheet" type="text/css"/>
    @show
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
                <li class="dropdown"><a id="main-menu-toggle" href="index.html#main-menu" class="">
                        <div class="iconset top-menu-toggle-white"></div>
                    </a></li>
            </ul>
            <!-- BEGIN LOGO -->
            <a href="index.html"><img src="<% asset('/packages/webarch/dist/img/logo.png') %>" class="logo" data-src="/assets/img/logo.png"
                                      data-src-retina="/assets/img/logo2x.png" height="21"/></a>
            <!-- END LOGO -->
            <ul class="nav pull-right notifcation-center">
                <li class="dropdown" id="header_task_bar"><a href="<% url('home') %>" class="dropdown-toggle active"
                                                             data-toggle="">
                        <div class="iconset top-home"></div>
                    </a></li>
                <li class="dropdown" id="header_inbox_bar"><a href="email.html" class="dropdown-toggle">
                        <div class="iconset top-messages"></div>
                        <span class="badge" id="msgs-badge">2</span> </a>
                <li class="dropdown" id="portrait-chat-toggler" style="display:none"><a href="index.html#sidr"
                                                                                        class="chat-menu-toggle">
                        <div class="iconset top-chat-white "></div>
                    </a>
            </li>
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    <li class="quicklinks"><a href="index.html#" class="" id="layout-condensed-toggle">
                            <div class="iconset top-menu-toggle-dark"></div>
                        </a></li>
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"><a href="index.html#" class="">
                            <div class="iconset top-reload"></div>
                        </a></li>
                    <li class="quicklinks"><span class="h-seperate"></span></li>
                    <li class="quicklinks"><a href="index.html#" class="">
                            <div class="iconset top-tiles"></div>
                        </a></li>
                    <div class="input-prepend inside search-form no-boarder">
                        <span class="add-on"> <a href="index.html#" class="">
                                <div class="iconset top-search"></div>
                            </a></span>
                        <input name="" type="text" class="no-boarder " placeholder="Search Dashboard"
                               style="width:250px;">
                    </div>
                </ul>
            </div>
        </div>
        <!-- END TOP NAVIGATION MENU -->

    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="user-info-wrapper">
            <div class="profile-wrapper">
                <img src="/packages/webarch/dist/img/profiles/avatar.jpg"
                     data-src="/packages/webarch/dist/img/profiles/avatar.jpg"
                     data-src-retina="/packages/webarch/dist/img/profiles/avatar2x.jpg" width="69" height="69"/>
            </div>
            <div class="user-info">
                <div class="greeting">Welcome</div>
                <div class="username"><% $user->first_name %> <span class="semi-bold"><% $user->last_name %></span>
                </div>
                <div class="status">Status<a href="index.html#">
                        <div class="status-icon green"></div>
                        Online</a></div>
            </div>
        </div>
        <!-- END MINI-PROFILE -->

        <!-- BEGIN MINI-WIGETS -->

        <!-- END MINI-WIGETS -->

        <!-- BEGIN SIDEBAR MENU -->
        <p class="menu-title">Menu <span class="pull-right"><a href="javascript:;"><i
                        class="icon-refresh"></i></a></span></p>
        @section('menu')
        <ul>
            <li class="start active ">
                <a href="dashboard"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span>
                    <span class="selected"></span> <span class="badge badge-important pull-right">5</span>
                </a>
            </li>
            <li class="start active ">
                <a href="dashboard"> <i class="icon-custom-home"></i> <span class="title">Account</span>
                    <span class="selected"></span> <span class="badge badge-important pull-right">5</span>
                </a>
            </li>
        </ul>
        @show
        <a href="#" class="scrollup">Scroll</a>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
    <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
            <div class="progress-bar progress-bar-success animate-progress-bar"
                 data-percentage="<% $this->percent ? : 0 %>%" style="width: <% $this->percent ? : 0 %>%;"></div>
        </div>
        <div class="pull-right">
            <div class="details-status">
                <span class="animate-number" data-value="86"
                      data-animation-duration="560"><% $this->percent ? : 0 %></span>%
            </div>
            <a href="/user/logout"><i class="icon-off"></i></a></div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        @section('content')

        @show
    </div>

    <script src="/packages/arx/arxmin/dist/js/arx-combined.js"></script>
</body>
</html>