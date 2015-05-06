<!DOCTYPE html>
@section('html')
<?php if ($this->ngapp) { $this->ngapp = 'ng-app="'.$this->ngapp.'" id="ng-app"';}  ?>
<!--[if lt IE 7]><html <?= $this->ngapp ?: '' ?> class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html <?= $this->ngapp ?: '' ?> class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html <?= $this->ngapp ?: '' ?> class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html <?= $this->ngapp ?: '' ?> class="no-js" lang="en"><!--<![endif]-->
@show
<head>
    @section('head')
    <meta charset="utf-8"/>
    <title><?= $this->headtitle ?: 'Arxmin' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    @show
    @section('css')
    <link href="<?php echo $theme_url ?>/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $theme_url ?>/css/arxmin-combined.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.3/es5-shim.min.js"></script>
    <![endif]-->
    <style>[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide {
            display: none !important;
        }
    </style>
    <?php /* Allow css hooking */ ?>
    <?= Asset::css(Hook::get('arxmin::css'));  ?>
    @show
    <script>
        // globals declaration
        window.__base_url = '<?php echo $theme_url; ?>/js';
        window.__public_url = '<?php echo url(); ?>';
        window.__app = <?= Hook::getJson('__app', (object) array()); ?>;
    </script>
</head>
<body <?php echo is_array($this->body['attributes']) ? HTML::attributes($this->body['attributes']) : '' ?>>

<div id="page-container">
    <nav class="navbar navbar-default navbar-fixed-top" id="page-header">

        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="animated fadeIn" src="<?php echo $theme_url; ?>/img/logo-b.png" alt="" />
            </a>
            <button type="button" class="navbar-toggle" ng-click="$parent.displaySidebar = !$parent.displaySidebar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right animated fadeIn">
                <li class="dropdown" dropdown>
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" dropdown-toggle>
                        <span class="visible-xs"><i class="fa fa-fw fa-user"></i></span>
                        <span class="hidden-xs">admin2 admin <span class="caret"></span></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://local.mypresslink.com/private/edit-user">Preferences</a>
                        </li>
                        <li>
                            <a href="/user/logout">Se déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
    <div class="row">
        <div class="side-menu-container col-sm-2">
            <aside class="sidebar sidebar-fixed-left navbar-spy" id="page-sidebar" ng-controller="SidebarController as sidebar">
                <ul class="nav nav-pills nav-stacked animated fadeIn">
                    <li ng-repeat="item in sidebar.menu track by $index" ng-class="{true: 'active'}[sidebar.isActive(item)]" ng-cloak>
                        <a ng-href="{{ item.link }}" ng-if="item.link" target="{{ item.target || '_self' }}">
                            <i class="fa {{ item.ico }} fa-lg fa-fw" ng-if="item.ico"></i>
                            <span>{{ item.name }}</span>
                        </a>

                        <button class="toggle-collapse" type="button" ng-init="item.isMenuCollapsed = !sidebar.isActive(item)"
                                ng-if="item.children && item.link"
                                ng-mouseup="item.isMenuCollapsed = !item.isMenuCollapsed">
                            <span ng-show="item.isMenuCollapsed">+</span>
                            <span ng-show="!item.isMenuCollapsed">-</span>
                        </button>

                        <a href="#" ng-init="item.isMenuCollapsed = !sidebar.isActive(item)" ng-if="item.children && !item.link"
                           ng-click="item.isMenuCollapsed = !item.isMenuCollapsed">
                            <i class="fa {{ item.ico }} fa-lg fa-fw" ng-if="item.ico"></i>
                            <span>{{ item.name }}</span>

                            <span class="pull-right" ng-show="item.isMenuCollapsed">+</span>
                            <span class="pull-right" ng-show="!item.isMenuCollapsed">-</span>
                        </a>

                        <ul class="nav" collapse="item.isMenuCollapsed" ng-if="item.children">
                            <li ng-repeat="child in item.children" ng-class="{true: 'active'}[sidebar.isActive(child)]">
                                <a ng-href="{{ child.link }}">
                                    <i class="fa {{ child.ico }} fa-fw" ng-if="child.ico"></i>
                                    <span>{{ child.name }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div><!-- /.navbar-collapse -->

        <section  class="content container-fluid animated fadeIn col-sm-offset-2 vert-offset-top-4" id="page-content">
            @section('content')

            @show
        </section><!--/#page-content-->
    </div>
</div>
@section('js')
    <script data-main="<?php echo $theme_url; ?>/js/components/home" src="<?php echo $theme_url; ?>/js/vendor/require.js"></script>
@show
<?php /* Allow script hooking */ ?>
<?= Asset::js(Hook::get('arxmin::js'));  ?>
</body>
</html>