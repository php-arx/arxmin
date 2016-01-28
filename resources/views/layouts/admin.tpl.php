<!DOCTYPE html>
@section('html')
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
@show
<head>
    <meta charset="utf-8"/>
    @section('head')
        <title><?= $this->title ?: '△rxmin' ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    @show
    <!--[if lt IE 9]>
    <?= HTML::script('//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js') ?>
    <?= HTML::script('//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.3/es5-shim.min.js') ?>
    <![endif]-->
    @section('css')
    <?= HTML::style('/packages/arx/arxmin/dist/css/plugins.min.css') ?>
    <?= HTML::style('/packages/arx/arxmin/dist/css/arxmin.min.css') ?>
    <?= HTML::style('/packages/arx/arxmin/dist/css/skins/skin-black.css') ?>
    @show
    <script>
        // globals declaration
        window.__base_url = '<?='/packages/arx/arxmin'; ?>/js';
        window.__public_url = '<?=url("/"); ?>';
        window.__app = <?= Hook::getJson('__app', (object) array()); ?>;
    </script>
</head>
<?php
$body['attributes']['class'] .= ' skin-black sidebar-mini';
?>
<body <?= (isset($body, $body['attributes']) ? HTML::attributes($body['attributes']) : '') ?>>
@if (Input::has('dd'))
<?= d($this->_data->__var) ?>
@endif
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b><img src="<?= $theme_url.'/img/logo-square.png'; ?>" width="20" alt=""/></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?= Arxmin::getOption('project_name', '<b>Arxmin</b><sup>Beta</sup>'); ?></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @section('messages-menu')
                    @if(isset($messages))
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success"><?= count($messages); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?= count($messages); ?> messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    @foreach($messages as $message)
                                    <li><!-- start message -->
                                        <a href="<?= $message['link']; ?>">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="<?= $message['thumb']; ?>" class="img-circle" alt=""/>
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                <?= $message['title']; ?>
                                            </h4>
                                            <!-- The message -->
                                            <p><?= $message['description']; ?></p>
                                        </a>
                                    </li><!-- end message -->
                                    @endforeach
                                </ul><!-- /.menu -->
                            </li>
                        </ul>
                    </li><!-- /.messages-menu -->
                    @endif
                    @show

                    @section('notifications-menu')
                    @if(isset($notifications))
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"><?= count($notifications); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?= count($notifications); ?> notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    @foreach($notifications as $notification)
                                    <li><!-- start notification -->
                                        <a href="<?= $notification['link'] ?:'#'; ?>">
                                            <i class="fa <?= $notification['icon'] ?: 'fa-envolop'; ?>"></i> <?= $notification['title']; ?>
                                        </a>
                                    </li><!-- end notification -->
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @show

                    @section('tasks-menu')
                    @if(isset($tasks))
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger"><?= count($tasks); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?= count($tasks); ?> tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    @foreach($tasks as $task)
                                    <li><!-- Task item -->
                                        <a href="<?= $task['link'] ?: '#'; ?>">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                <?= $task['title'] ?: '#'; ?>
                                                <small class="pull-right"><?= $task['progress'] ?: '#'; ?>%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: <?= $task['progress'] ?: '0'; ?>%" role="progressbar" aria-valuenow="<?= $task['progress'] ?: '0'; ?>" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only"><?= $task['progress'] ?: '0'; ?>% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @show

                    @section('user-menu')
                    @if(isset($user))
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?=$user->getGravatar(); ?>" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?=$user->first_name; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?=$user->getGravatar(); ?>" class="img-circle" alt="User Image" />
                                <p>
                                    <?=$user->first_name; ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                @section('user-body')
                                    <!-- HERE YOU CAN ADD YOUR BUTTON -->
                                @show
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                @section('user-footer')
                                <div class="pull-right">
                                    <a href="<?= url("/"); ?>/arxmin/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                                @show
                            </li>
                        </ul>
                    </li>
                    @endif
                    @show

                    @section('control-sidebar-menu')
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                    @show
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        @section('sidebar')
        <section class="sidebar">
            @section('sidebar-menu')
            <ul class="sidebar-menu">
                @foreach($menu as $item)
                @if(isset($item['children']))
                <li class="treeview">
                    <a href="<?= $item['link']; ?>"><i class="fa <?= $item['ico']; ?>"></i> <span><?= $item['name']; ?></span></a>
                    <ul class="treeview-menu">
                        @foreach($item['children'] as $item2)
                        <li><a href="<?= $item2['link']; ?>"><i class="fa <?= $item2['ico']; ?>"></i> <span><?= $item2['name']; ?></span></a></li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li><a href="<?= $item['link']; ?>"><i class="fa <?= $item['ico']; ?>"></i> <span><?= $item['name']; ?></span></a></li>
                @endif
                @endforeach
            </ul>
            @show
        </section>
        @show
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @section('content-header')
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="<?= @$user->type; ?>/"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active">Here</li>
            </ol>
            <h1>
                <?= $this->title; ?>
                <small><?= $this->description; ?></small>
            </h1>
        </section>
        @show
        <!-- Main content -->
        <section class="content">
            @section('content')

            @show
        </section>
    </div>

    @section('footer')

    @show

    @section('control-sidebar')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        @section('control-sidebar-tabs')
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        @show
        <div class="tab-content">
            @section('control-sidebar-tabs-content')
            <div class="tab-pane active" id="control-sidebar-home-tab">
                @section('control-sidebar-home-tab')

                @show
            </div>

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                @section('control-sidebar-settings-tab')

                @show
            </div>
            @show
        </div>
    </aside>
    <div class='control-sidebar-bg'></div>
    @show
</div>

@section('js')
    <?= Asset::js([
       'packages/arx/arxmin/dist/js/plugins.js',
       'packages/arx/arxmin/dist/js/arxmin.js'
    ]) ?>
@show
</body>
</html>