@extends('arxmin::layouts.admin')

<?php
/**
 * Loader Config
 */

$this->ngapp = "app";

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
    <div class="row">
        
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $this->title ?: 'Form Builder' ?></h1>
            </div>
            <div class="col-md-6">
                <a class="btn pull-right" ng-click="save()" href="#save">Save Data</a>
            </div>
        </div>

        <hr/>

        <div class="col-md-6" style="overflow: scroll;height: 700px;">
            <div fb-components></div>
        </div>

        <div class="col-md-6" style="overflow: scroll;height: 700px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Builder</h3>
                </div>
                <div fb-builder="default"></div>
                <div class="panel-footer">
                    <div class="checkbox">
                        <label><input type="checkbox" ng-model="isShowScope"/>
                            Show scope
                        </label>
                    </div>
                    <pre ng-if="isShowScope">{{form}}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@parent
<?php

echo Asset::css([
    Arxmin::getThemeUrl('/plugins').'/angular-form-builder/dist/angular-form-builder.css'
]);
?>
@stop

@section('js')

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//code.angularjs.org/1.2.18/angular.min.js"></script>

<?php
echo Asset::js([
    Arxmin::getThemeUrl('/plugins').'/angular-form-builder/dist/angular-form-builder.js',
    Arxmin::getThemeUrl('/plugins').'/angular-form-builder/dist/angular-form-builder-components.js',
    Arxmin::getThemeUrl('/plugins').'/angular-validator/dist/angular-validator.js',
    Arxmin::getThemeUrl('/plugins').'/angular-validator/dist/angular-validator-rules.js',
]);
?>

@include('arxmin::components.default')
@include('arxmin::components.custom')
<script>

    (function() {
        angular.module('app', ['builder', 'builder.components', 'validator.rules'])
            .controller('buildCtrl', ['$scope', '$builder', '$validator', function($scope, $builder, $validator) {

                $builder.addFormObject('default', {
                    component: 'textInput',
                    label: 'Name',
                    description: 'Your name',
                    placeholder: 'Your name',
                    required: true,
                    editable: false
                });

                $builder.addFormObject('default', {
                    component: 'checkbox',
                    label: 'Pets',
                    description: 'Do you have any pets?',
                    options: ['Dog', 'Cat']
                });

                $scope.form = $builder.forms['default'];
                $scope.input = [];
                $scope.defaultValue = <?php echo Hook::getJson('scope.defaultValue', (object)[]); ?>;



                return $scope.submit = function() {
                    return $validator.validate($scope, 'default').success(function() {
                        return console.log('success');
                    }).error(function() {
                        return console.log('error');
                    });
                };
            }
        ]);

    }).call(this);
</script>
@stop