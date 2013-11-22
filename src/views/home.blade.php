@extends('arxmin::html')
@section('body')
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @foreach($menu as $key => $link)
            @if(isset($link['children']))
            <li class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown">{{ $link['name'] }} <b class="caret"></b></a>

                <ul class="dropdown-menu">
                    @foreach($link['children'] as $link2)
                    <li><a href="{{ URL::to('arxmin/home') }}?url={{ $link2['href'] }}"><i class="icon-home"></i> {{ $link2['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            @else
            <li><a href="{{ URL::to('arxmin/home') }}?url={{$link['href']}}"><i class="icon-home"></i> {{ $link['name'] }}</a></li>
            @endif
            @endforeach
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div class="background-fixed" style="top: 50px;">
    <iframe ng-controller="IframeCntl" src="{{ $currentIframe }}" frameborder="0" name="appiframe"></iframe>
</div>

@stop

@section('js')
<script type="text/javascript" data-main="{{ asset('packages/arx/dist/js/arx.min.js') }}" src="{{ asset('packages/requirejs/require.js') }}"></script>
@stop
