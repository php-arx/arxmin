<!DOCTYPE html>
@section('html')
<?php if ($this->ngapp) { $this->ngapp = 'ng-app="'.$this->ngapp.'" id="ng-app"';}  ?>
<!--[if lt IE 7]><html <?= $this->ngapp or '' ?> class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html <?= $this->ngapp or '' ?> class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html <?= $this->ngapp or '' ?> class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html <?= $this->ngapp or '' ?> class="no-js" lang="en"><!--<![endif]-->
@show
<head>
    @section('head')
    <meta charset="utf-8"/>
    <title><?= $this->headtitle ?: 'Arxmin' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    @show
    @section('css')
    <link href="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/css/arxmin-combined.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo \Arxmin\Arxmin::getThemeUrl() ?>/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <?php /* Allow css hooking */ ?>
    <?= Asset::css(Hook::get('arxmin::css'));  ?>
    @show


    <script>
        window.__app = <?= Hook::getJson('__app', (object) array()); ?>;
    </script>
</head>
<body <?php echo is_array($this->body['attributes']) ? HTML::attributes($this->body['attributes']) : '' ?>>

@if(!isset($noheader))
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
                <li class="dropdown">
                    <a id="main-menu-toggle" href="#main-menu" class="">
                        <div class="iconset top-menu-toggle-white"></div>
                    </a>
                </li>
            </ul>
            <a href="#"><img class="logo" src="<?php echo Arxmin::getThemeUrl() ?>/img/logo.png" height="40" alt="" /></a>
        </div>
        <!--/.header-separation -->
        <div class="header-quick-nav">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    <li class="quicklinks"><a href="#" class="" id="layout-condensed-toggle">
                            <div class="iconset top-menu-toggle-dark"></div>
                        </a></li>
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"><a href="#" class="">
                            <div class="fa fa-rotate-left"></div>
                        </a></li>
                    <li class="quicklinks"><span class="h-seperate"></span></li>
                    <li class="quicklinks"><a href="#" class="">
                            <div class="fa fa-arrow-left"></div>
                        </a></li>
                    <div class="input-prepend inside search-form no-boarder">
                        <span class="add-on"> <a href="#" class="">
                                <div class="fa fa-search"></div>
                            </a></span>
                        <input name="" type="text" class="no-boarder " placeholder="Search"
                               style="width:250px;">
                    </div>
                </ul>
            </div>

            <div class="pull-right">
                <div class="chat-toggler">
                    <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"
                       data-content='TEST NIGGA' data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details">
                            <div class="username">
                                <span class="badge badge-important">3</span>
                                John <span class="bold">Smith</span>
                            </div>
                        </div>
                        <div class="iconset top-down-arrow"></div>
                    </a>
                    <div class="profile-pic">
                        <img alt="" src="<?= $user->gravatar() ?>" data-src="<?= $user->gravatar() ?>" data-src-retina="<?= $user->gravatar() ?>" width="35" height="35" />
                    </div>
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">
                            <div class="iconset top-settings-dark "></div>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
                            <li><a href="<?php echo action('Arxmin\\ModuleUserController@getAccount')  ?>"> My Account</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo action('Arxmin\\UserController@logout')  ?>"><i class="icon-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks">
                        <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" ><div class="iconset top-chat-dark "><span class="badge badge-important hide" id="chat-message-count">1</span></div>
                        </a>
                        <div class="simple-chat-popup chat-menu-toggle hide" >
                            <div class="simple-chat-popup-arrow"></div><div class="simple-chat-popup-inner">
                                <div style="width:100px">
                                    <div class="semi-bold"><?= $user->username ?></div>
                                    <div class="message">Hey you there </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->

    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
@endif
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" id="main-menu">
        @section('menu')
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
            <ul class="arx-menu">
                @if(isset($menu))
                @foreach((array) $menu as $key => $item)
                <li @if(Request::url() === $item['link'])class="active"@endif >
                <a href="<?php echo $item['link'] ?>" title="">
                    <?php if (isset($item['ico'])) {
                        echo '<i class="fa '.$item['ico'].' fa-lg fa-fw"></i> ';
                    } ?>
                    <span class="title"><?php echo $item['name'] ?></span>
                </a>

                @if(isset($item['items']))
                <ul class="nav sub-menu">
                    @foreach($item['items'] as $key2 => $item2)
                    <li>
                        <a href="<?php echo $item2['link'] ?>" title="">
                            <?php if (isset($item2['ico'])) {
                                echo '<i class="fa '.$item2['ico'].' fa-lg fa-fw"></i> ';
                            } ?>
                            <span class="title"><?php echo $item2['name'] ?></span>
                        </a>
                        @if(isset($item2['items']))
                        <ul class="nav sub-menu">
                            @foreach($item2['items'] as $key3 => $item3)
                            <li>
                                <a href="<?php echo $item3['link'] ?>" title="">
                                    <?php if (isset($item3['ico'])) {
                                        echo '<i class="fa '.$item3['ico'].' fa-lg fa-fw"></i> ';
                                    } ?>
                                    <span class="title"><?php echo $item3['name'] ?></span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
                </li>
                @endforeach
                @else
                <ul>
                    <li class="start active">
                        <a href="#">
                            <i class="fa fa-home"></i> <span class="title">Dashboard</span>
                        </a>
                    </li>
                </ul>
                @endif
            </ul><!--/.arx-menu -->
            <div class="clearfix"></div>
            <!-- END SIDEBAR MENU -->
        </div><!--/#main-menu-wrapper -->
        @show
        <!-- END SIDEBAR MENU -->
    </div><!--/#menu-->
    <!-- END SIDEBAR -->

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>{{ portlet.title }}</h3>
            </div>
            <div class="modal-body">
                {{ portlet.body }}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            @section('content')
                <!-- HERE IS THE CONTENT -->
            @show
        </div>
    </div>
</div>

<!-- Right SideZone -->
<div id="sidr" class="chat-window-wrapper">
    <div id="main-chat-wrapper" >
        <div class="chat-window-wrapper fadeIn" id="chat-users" >
            <!-- @todo Dynamise -->
        </div>
        <div class="chat-window-wrapper fadeIn" id="messages-wrapper" style="display:none">
            <!-- -->
        </div>
        <div class="chat-input-wrapper" style="display:none">
            <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- RightZoneSlide -->

@section('js')
    <script src="<?php echo Arxmin::getThemeUrl() ?>/js/arxmin-combined.js"></script>

    <?php
        # @todo Steph => bougé ça dans ce qui est le plus logique...
    ?>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/skycons/skycons.js"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-polymaps/polymaps.min.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="<?php echo Arxmin::getThemeUrl() ?>/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>

    <?php /* Allow script hooking */ ?>
    <?= Asset::js(Hook::get('arxmin::js'));  ?>
@show
</body>
</html>