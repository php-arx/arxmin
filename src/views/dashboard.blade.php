@extends('arxmin::layouts.html')

@section('head')
@parent
<link rel="stylesheet" href="/packages/arx/arxmin/css/style.css"/>
@stop

@section('body')
<div class="container-fluid">
    <div class="row">
        <div id="navbar" class="col-2">
            <ul class="nav nav-stacked">
                @foreach($menu as $link)
                <li><a href="/{{$link['href']}}"><i class="icon-home"></i> {{ $link['name'] }}</a></li>
                @if(isset($link['children']))
                    @foreach($link['children'] as $link)
                    <li><a href="{{$link['href']}}"><span class="ui-icon ui-icon-disk"></span>{{ $link['name'] }}</a></li>
                    @endforeach
                @endif
                @endforeach
            </ul>
        </div>
        <div id="content" class="col-10 col-push-2">
            @include('arxmin::handlebar.iframe')
        </div>
    </div>
</div>
@stop

@section('javascripts')
@parent
<script type="text/javascript">
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

    function IframeCntl($scope, $route, $routeParams, $location) {
        $scope.$route = $route;
        $scope.$location = $location;
        $scope.$routeParams = $routeParams;
    }
</script>
@stop