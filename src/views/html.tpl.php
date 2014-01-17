@extends('arx::html')

@section('head')
<link rel="stylesheet" href="<% asset('packages/arxmin/css/plugins.css') %>" />
<link rel="stylesheet" href="<% asset('packages/arxmin/css/arx.css') %>" />
@stop

@section('js')
<script src="<% asset('packages/arxmin/js/plugins.css') %>"></script>
<script src="<% asset('packages/arxmin/js/arx.css') %>"></script>
@stop

@section('body')
    <div class="header navbar navbar-inverse">
        @section('navigation')
            @yield('navigation')
        @stop
    </div>
    <div class="page-container row">
        @section('content')
            @yield('content')
        @show
    </div>
@stop
