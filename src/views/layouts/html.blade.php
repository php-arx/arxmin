@extends('arx::html')
@section('doctype')
<!doctype html>
<html ng-app="ngArxmin">
@stop

@section('head')

<link rel="stylesheet" href="/packages/arx/ui/css/main.min.css?v=1" />

<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
@stop

@section('body')
    @include('arx::snippets.container')
@stop

@section('js')
<script src="/packages/arx/ui/js/plugins/jquery/jquery.min.js"></script>
<script src="/packages/arx/ui/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/packages/arx/ui/js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="/packages/arx/ui/js/main.min.js"></script>
@stop