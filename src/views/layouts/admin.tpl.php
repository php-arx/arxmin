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
                <img src="<% $user->gravatar() %>" alt="" width="60" height="60"/><span> <% $user->full_name() ?: 'Admin' %> </span></a>
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
        <ul>
            @if(isset($menu))
                @foreach((array) $menu as $key => $item)
                <li @if(Request::url() === $item['link'])class="active"@endif >
                    <a href="<?php echo $item['link'] ?>" title="">
                        <?php if (isset($item['ico'])) {
                            echo '<i class="fa '.$item['ico'].' fa-lg fa-fw"></i> ';
                        } ?>
                        <span><?php echo $item['name'] ?></span>
                    </a>

                    @if(isset($item['children']))
                    <ul class="nav">
                        @foreach($item['children'] as $key2 => $item2)
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