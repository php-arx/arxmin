<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="<?php echo Arxmin::getThemeUrl() ?>/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Arxmin::getThemeUrl() ?>/css/arxmin.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.3/es5-shim.min.js"></script>
    <![endif]-->
    <style>[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide {
            display: none !important;
        }</style>
</head>
<body class="private page-admin" data-spy="scroll" data-target=".navbar-spy" ng-controller="installController">
<div id="page-container">
    <nav class="navbar navbar-default navbar-fixed-top" id="page-header">

        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="animated fadeIn" src="<?php echo Arxmin::getThemeUrl() ?>/img/logo-b.png" height="80px" alt="MyPresslink.com" />
            </a>
            <button type="button" class="navbar-toggle" ng-click="$parent.displaySidebar = !$parent.displaySidebar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </nav>
    <div class="row">
        <section class="side-menu-container col-sm-2">
            <aside class="sidebar sidebar-fixed-left navbar-spy" id="page-sidebar">
                <ul class="nav nav-pills nav-stacked animated fadeIn">
                    <li>
                        <a href="#step-1">
                            <i class="fa fa-cog fa-lg fa-fw"></i>
                            <span>Step 1 : check</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-2">
                            <i class="fa fa-cog fa-lg fa-fw"></i>
                            <span>Step 2 : connexion</span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-3">
                            <i class="fa fa-cog fa-lg fa-fw"></i>
                            <span>Step 3 : configuration</span>
                        </a>
                    </li>
                    <li style="display: none" class="animate fadeIn">
                        <a href="#step-3">
                            <i class="fa fa-cog fa-lg fa-fw"></i>
                            <span>Step 3 : configuration</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </section><!-- /.navbar-collapse -->

        <section class="content container-fluid animated fadeIn col-sm-offset-2 vert-offset-top-3" id="page-content">
            <div class="content">

                <h2>Welcome in Arxmin Installation</h2>

                <div id="step1" class="col-12 column">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-check"></i> 1. <?php echo trans('arxmin::install.step.check.title') ?></h3>

                            <div class="btn-group">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i
                                            class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                            </div>
                        </div>
                        <div class="panel-body collapse in" id="collapse1">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h2><?= trans("arxmin::install.step.check.requirements") ?><br></h2>
                                    <?php
                                    foreach ($requirements as $key => $value) {
                                        echo '<dt>' . $key . '</dt>';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <h2><?= trans("arxmin::install.step.check.value") ?></h2>
                                    <?php
                                    foreach ($requirements as $key => $value) {
                                        echo '<dt>' . $value['value'] . '</dt>';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-6">
                                    <h2><?= trans("arxmin::install.step.check.comments") ?></h2>
                                    <?php
                                    foreach ($requirements as $key => $value) {
                                        echo '<dt>' . $value['comment'] . '</dt>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <a class="btn btn-success pull-right"
                               href="#"><?php echo trans('arxmin::install.action.refresh') ?></a>
                        </div>
                    </div>

                </div>
                <!--/ #step1 -->
                <div id="step2" class="col-12 column">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> 2. <?php echo trans('arxmin::install.step.db.title') ?></h3>

                            <div class="btn-group">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i
                                            class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                            </div>
                        </div>
                        <div class="panel-body collapse in" id="collapse1" ng-cloak>

                            <form action="<?php echo url('install') ?>">
                                <div class="form-group" id="database[default]">
                                    <label for="database[default]">DB Type : </label>
                                    <select name="database[default]" id="database[default]" ng-model="database.default"
                                            ng-change="updateDbForm()">
                                        <option value="{{ db.driver }}" ng-if="db.driver == database.default" selected="selected"
                                                ng-repeat="db in database.connections">{{ database.default }}
                                        </option>
                                        <option value="{{ db.driver }}" ng-if="db.driver != database.default"
                                                ng-repeat="db in database.connections">{{ db.driver }}
                                        </option>
                                    </select>
                                    <fieldset id="databaseField">
                                        <div class="form-group" ng-repeat="(key, value) in database.connections[database.default]">
                                            <label for="database[{{ key }}]">{{ key }}</label> <input type="text"
                                                                                                      name="database[{{ key }}]"
                                                                                                      value="{{ value }}"/>
                                        </div>

                                    </fieldset>
                                </div>
                                <div class="alert alert-success" ng-show="db.success">
                                    Everything seems ok
                                </div>
                                <a class="btn btn-success pull-right" ng-click="checkDb()"><?php echo trans('arxmin::install.action.refresh') ?></a>
                            </form>
                        </div>
                    </div>

                </div>
                <!--/ #step2 -->

                <div id="step3" class="col-12 column">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i
                                        class="fa fa-cogs"></i> 3. <?php echo trans('arxmin::install.step.project.title') ?></h3>

                            <div class="btn-group">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i
                                            class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                            </div>
                        </div>
                        <div class="panel-body collapse in" id="collapse1">
                            <form action="<?php echo 'install'; ?>" method="POST">
                                <?=
                                \Arx\BootstrapHelper::formGroup('Arxmin project name : ', 'select', 'category', trans('arxmin::categories'));
                                ?>
                                <?php echo \Arx\BootstrapHelper::formGroup('Arxmin project name : ', 'text', 'project', Config::get('project.name')) ?>
                                <?php echo \Arx\BootstrapHelper::formGroup('Arxmin First Name : ', 'text', 'first_name', 'admin') ?>
                                <?php echo \Arx\BootstrapHelper::formGroup('Arxmin Last Name : ', 'text', 'last_name', 'admin') ?>
                                <?php echo \Arx\BootstrapHelper::formGroup('Arxmin Email : ', 'text', 'email', '') ?>
                                <?php echo \Arx\BootstrapHelper::formGroup('Arxmin password : ', 'text', 'password', '') ?>
                                <?php echo \Arx\BootstrapHelper::formGroup('Arxmin password confirmation : ', 'text', 'password_confirmation', '') ?>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!--/ #step3 -->

                <div id="send" class="col-12 column">
                    <a class="btn btn-default pull-right" ng-click="" href="#submit">Submit</a>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    window.__base_url = "<?php echo Arxmin::getThemeUrl('/js') ?>";
    window.__app = <?php echo Hook::getJson('__app', []); ?>;
</script>
<script data-main="<?php echo Arxmin::getThemeUrl() ?>/js/components/install" src="<?php echo Arxmin::getThemeUrl() ?>/js/vendor/require.js"></script>
</body>
</html>