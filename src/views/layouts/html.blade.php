@extends('arx::html')
@section('doctype')
<!doctype html>
<html ng-app="ngArxmin">
@stop

@section('head')
    @parent
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular-resource.min.js"></script>
    <script src="https://cdn.firebase.com/v0/firebase.js"></script>
    <script src="http://firebase.github.io/angularFire/angularFire.js"></script>
@stop

@section('body')
    @include('snippets.container')
@stop

@section('js')
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
<script>
    angular.module('ngArxmin', [], function($routeProvider, $locationProvider) {
        $routeProvider.when('/Book/:bookId', {
            templateUrl: 'book.html',
            controller: BookCntl,
            resolve: {
                // I will cause a 1 second delay
                delay: function($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        });
        $routeProvider.when('/Book/:bookId/ch/:chapterId', {
            templateUrl: 'chapter.html',
            controller: ChapterCntl
        });

        // configure html5 to get links working on jsfiddle
        $locationProvider.html5Mode(true);
    });

    function MainCntl($scope, $route, $routeParams, $location) {
        $scope.$route = $route;
        $scope.$location = $location;
        $scope.$routeParams = $routeParams;
    }

    function BookCntl($scope, $routeParams) {
        $scope.name = "BookCntl";
        $scope.params = $routeParams;
    }

    function ChapterCntl($scope, $routeParams) {
        $scope.name = "ChapterCntl";
        $scope.params = $routeParams;
    }
</script>
@stop