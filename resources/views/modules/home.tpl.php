@extends('arxmin::layouts.admin')

@section('css')
    @parent
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.css">
@stop

@section('js')
    @parent
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.js"></script>
@stop

@section('content')
<div class="container-fluid" ng-app="moduleApp" ng-controller="moduleCtrl">
    <div class="row">
        <form action="" class="form">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="search" placeholder="Search any modules">
                </div>
            </div>
        </form>
    </div>
    <div class="row">

    </div>
</div>
@stop

@section('js')
    @parent
    <script>
        var app = angular.module('moduleApp', []);

        app.controller('moduleCtrl', function($scope, $http){
            $scope.modules = window.__app.modules;
        });

    </script>
@stop