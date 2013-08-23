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
                <li><a href="{{ URL::to('arxmin/home') }}?url={{$link['href']}}"><i class="icon-home"></i> {{ $link['name'] }}</a></li>
                @if(isset($link['children']))
                    @foreach($link['children'] as $link)
                    <li><a href="{{ link_to('arxmin/home') }}?url={{$link['href']}}"><span class="ui-icon ui-icon-disk"></span>{{ $link['name'] }}</a></li>
                    @endforeach
                @endif
                @endforeach
            </ul>
        </div>
        <div id="content" class="col-10 col-push-2">
            <iframe ng-controller="IframeCntl" src="{{ $currentIframe }}" width="100%" height="1000px" class="app" frameBorder="0"></iframe>
        </div>
    </div>
</div>
@stop

@section('javascripts')
@parent
@stop