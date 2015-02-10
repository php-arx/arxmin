@extends('arxmin::layouts.admin')

<?php
/**
 * Loader Config
 */

$this->ngapp = "app";

$this->help();

Arxmin::loadPlugin('jquery-ui', 'xeditable');

?>

@section('header')
    @parent
    <script>
        window.__app = <?= Hook::getJson('__app', (object) array()); ?>;
    </script>
@stop

@section('content')

    <div class="container-fluid" ng-controller="buildCtrl">
        <?= Former::open()
                ->id('MyForm')
                ->secure()
                ->rules(['name' => 'required'])
                ->class('form')
                ->method('GET'); ?>
        <div class="row" style="height: 1000px;">
            <div class="col-sm-9 scrollable">
                <?php
                echo FormHelper::text('title', $item['title']);
                echo FormHelper::group(__('slug'), FormHelper::text('slug', $item['slug']));

                echo Former::textarea('body')
                        ->value($item['body'])
                        ->class('ckeditor')
                        ->rows(10)->columns(30)
                        ->autofocus();
                ?>

                <div class="row">
                    <h2>Meta Fields</h2>
                    <hr/>
                    <form class="form-horizontal">
                        <div ng-model="input" fb-form="default" fb-default="defaultValue"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" ng-click="submit()" class="btn btn-default"/>
                            </div>
                        </div>
                    </form>
                    <div class="checkbox">
                        <label><input type="checkbox" ng-model="isShowScope" ng-init="isShowScope=true" />
                            Show scope
                        </label>
                    </div>
                    <pre ng-if="isShowScope">{{input}}</pre>
                </div>
            </div>
            <div class="col-sm-3 scrollable">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Publish</h3>
                    </div>
                    <div class="panel-body">
                        <?php

                        $this->bodyAttributes('class', 'page-edit');

                        echo Former::actions()
                                ->large_primary_submit('Save')
                        ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Language</h3>
                    </div>
                    <div class="panel-body">
                        <?=
                            FormHelper::group(FormHelper::select('lang', Arxmin::getLangs(), $item['lang']));
                        ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Catégories</h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
        <?= Former::close(); ?>
    </div><!-- .container-fluid-->
@stop

@section('css')
    @parent
    <?php

    echo Asset::css([
            Arxmin::getThemeUrl('/plugins') . '/angular-form-builder/dist/angular-form-builder.css'
    ]);
    ?>
@stop

@section('js')

    @parent

    <?php
    echo Asset::js([
            Arxmin::getThemeUrl('/plugins') . '/angular-form-builder/dist/angular-form-builder.js',
            Arxmin::getThemeUrl('/plugins') . '/angular-form-builder/dist/angular-form-builder-components.js',
            Arxmin::getThemeUrl('/plugins') . '/angular-validator/dist/angular-validator.js',
            Arxmin::getThemeUrl('/plugins') . '/angular-validator/dist/angular-validator-rules.js',
    ]);
    ?>

    <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>

    @include('arxmin::components.default')
    @include('arxmin::components.custom')

    <script>
        (function () {
            angular.module('app', ['builder', 'builder.components', 'validator.rules'])
                    .controller('buildCtrl', ['$scope', '$builder', '$validator', function ($scope, $builder, $validator) {

                        $builder.addFormObject('default', {
                            component: 'textInput',
                            label: 'Name',
                            description: 'Meta.text',
                            placeholder: 'Meta.text',
                            required: true,
                            editable: true,
                            value : "meta.name"
                        });

                        $scope.form = $builder.forms['default'];
                        $scope.input = [];

                        $scope.defaultValue = <?php echo Hook::getJson('scope.defaultValue', (object)[]); ?>;

                        $scope.submit = function () {
                            return $validator.validate($scope, 'default').success(function () {
                                return console.log('success');
                            }).error(function () {
                                return console.log('error');
                            });
                        };
                    }
                    ]);

        }).call(this);
    </script>
@stop