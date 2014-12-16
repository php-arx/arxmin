<!DOCTYPE html>
@section('html')
<?php if (isset($ngapp)) { $ngapp = 'ng-app="'.$ngapp.'" id="ng-app"';}  ?>
<!--[if lt IE 7]><html <% $ngapp or '' %> class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html <% $ngapp or '' %> class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html <% $ngapp or '' %> class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html <% $ngapp or '' %> class="no-js" lang="en"><!--<![endif]-->
@show
<head>
    @section('head')
    <meta charset="utf-8"/>
    <title><% $this->title %></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    @show
    @section('css')
        <link href="/packages/arx/arxmin/dist/css/arxmin-combined.css" rel="stylesheet" type="text/css"/>
    @show
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>

@if(!isset($noheader))
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <a href="<?php echo url(); ?>">
                @if(isset($user))
                <img src="<% @$user->gravatar() %>" alt="" width="60" height="60"/><span> <% @$user->full_name() ?: 'Admin' %> </span>
                @endif
            </a>
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
                        <input name="" type="text" class="no-boarder " placeholder="Search"
                               style="width:250px;">
                    </div>
                </ul>
            </div>

            <div class="pull-right">
                <div class="chat-toggler">
                    <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"
                       data-content='
						<div style="width:300px" class="scroller" data-height="100px">
						  <div class="notification-messages info">
									<div class="user-profile">
										<img src="img/profiles/d.jpg" data-src="img/profiles/d.jpg" data-src-retina="img/profiles/d2x.jpg" width="35" height="35">
									</div>
									<div class="message-wrapper">
										<div class="heading">
											David Nester - Commented on your wall
										</div>
										<div class="description">
											Meeting postponed to tomorrow
										</div>
										<div class="date pull-left">
										A min ago
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							<div class="notification-messages danger">
								<div class="iconholder">
									<i class="icon-warning-sign"></i>
								</div>
								<div class="message-wrapper">
									<div class="heading">
										Server load limited
									</div>
									<div class="description">
										Database server has reached its daily capicity
									</div>
									<div class="date pull-left">
									2 mins ago
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="notification-messages success">
								<div class="user-profile">
									<img src="img/profiles/h.jpg" data-src="img/profiles/h.jpg" data-src-retina="img/profiles/h2x.jpg" width="35" height="35">
								</div>
								<div class="message-wrapper">
									<div class="heading">
										You haveve got 150 messages
									</div>
									<div class="description">
										150 newly unread messages in your inbox
									</div>
									<div class="date pull-left">
									An hour ago
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>' data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details">
                            <div class="username">
                                <span class="badge badge-important">3</span>
                                John <span class="bold">Smith</span>
                            </div>
                        </div>
                        <div class="iconset top-down-arrow"></div>
                    </a>
                    <div class="profile-pic">
                        <img alt="" src="img/profiles/avatar_small.jpg" data-src="img/profiles/avatar_small.jpg" data-src-retina="img/profiles/avatar_small2x.jpg" width="35" height="35" />
                    </div>
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">
                            <div class="iconset top-settings-dark "></div>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
                            <li><a href="user-profile.html"> My Account</a>
                            </li>
                            <li><a href="calender.html">My Calendar</a>
                            </li>
                            <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks">
                        <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" ><div class="iconset top-chat-dark "><span class="badge badge-important hide" id="chat-message-count">1</span></div>
                        </a>
                        <div class="simple-chat-popup chat-menu-toggle hide" >
                            <div class="simple-chat-popup-arrow"></div><div class="simple-chat-popup-inner">
                                <div style="width:100px">
                                    <div class="semi-bold">David Nester</div>
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
</div>
@endif
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar affix affix-top" id="main-menu">
        @section('menu')
        <ul class="navbar-fixed-top" style="padding-top: 80px;">
            @if(isset($menu))
                @foreach((array) $menu as $key => $item)
                <li @if(Request::url() === $item['link'])class="active"@endif >
                    <a href="<?php echo $item['link'] ?>" title="">
                        <?php if (isset($item['ico'])) {
                            echo '<i class="fa '.$item['ico'].' fa-lg fa-fw"></i> ';
                        } ?>
                        <span><?php echo $item['name'] ?></span>
                    </a>

                    @if(isset($item['items']))
                    <ul class="nav">
                        @foreach($item['items'] as $key2 => $item2)
                        <li>
                            <a href="<?php echo $item2['link'] ?>" title="">
                                <?php if (isset($item2['ico'])) {
                                    echo '<i class="fa '.$item2['ico'].' fa-lg fa-fw"></i> ';
                                } ?>
                                <span><?php echo $item2['name'] ?></span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            @else
                <ul>
                    <li class="start active ">
                        <a href="#dashboard">
                            <i class="fa fa-home"></i> <span class="title">Dashboard</span>
                        </a>
                    </li>
                </ul>
            @endif
        </ul>
        @show
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        @section('content')

        @show
    </div>

    @section('js')
    <script src="/packages/arx/arxmin/dist/js/arxmin-combined.js"></script>
    @show
</body>
</html>