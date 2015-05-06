@extends('arxmin::layouts.admin')

@section('content')
<div class="container-fluid" ng-controller="treeController">
    <section id="main-content" class="animated fadeInRight ng-scope">
        <a class="btn" href="#" ng-click="newSubitem()">Add an item</a>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $this->title ?: __("Tree manager"); ?></h3>
                        <div class="actions pull-right">
                            <i data-fullscreen-widget class="fa fa-expand"></i>
                            <i data-widget-toggle class="fa fa-chevron-down"></i>
                            <i data-widget-close class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Nested list template -->
                        <script type="text/ng-template" id="items_renderer.html">
                            <div ui-tree-handle>
                                <a class="btn btn-success btn-xs" data-nodrag ng-click="toggle(this)"><span class="fa" ng-class="{'fa-chevron-right': collapsed, 'fa-chevron-down': !collapsed}"></span></a> {{item.title}}
                                <a class="pull-right btn btn-danger btn-xs" data-nodrag ng-click="remove(this)"><span class="fa fa-times"></span></a>
                                <a class="pull-right btn btn-primary btn-xs" data-nodrag ng-click="newSubItem(this)" style="margin-right: 8px;"><span class="fa fa-plus"></span></a>
                            </div>
                            <ol ui-tree-nodes="options" ng-model="item.items" ng-class="{hidden: collapsed}">
                                <li ng-repeat="item in item.items" ui-tree-node ng-include="'items_renderer.html'">
                                </li>
                            </ol>
                        </script>
                        <div ui-tree="options">
                            <ol ui-tree-nodes ng-model="list">
                                <li ng-repeat="item in list" ui-tree-node ng-include="'items_renderer.html'"></li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@stop

@section('css')
@parent
<?php
    Asset::css([
        //Arxmin::getThemeUrl('plugins/angular-ui-tree/angular-ui-tree.min.css')
    ]);
?>
@stop

@section('js')
<script data-main="<?php echo $theme_url; ?>/js/components/tree" src="<?php echo $theme_url; ?>/js/vendor/require.js"></script>
@stop