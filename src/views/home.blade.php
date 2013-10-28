@extends('arxmin::html')
@section('body')
<div class="container arx-container">
    <div class="row">
        <div class="col-sm-2 hidden-print arx-sidebar">
            <div data-spy="affix" data-offset-bottom="50" data-offset-top="50">
                <ul class="nav nav-clean">
                    @foreach($menu as $key => $link)
                    @if(isset($link['children']))
                    <li>
                        <button class="btn btn-link" data-toggle="collapse" data-target="#menu-{{$key}}"><i class="icon-home"></i> {{ $link['name'] }} <i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                        <ul class="nav collapse in" id="menu-{{$key}}">
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
            </div>
        </div>
        <div class="col-sm-10 arx-content">
            <iframe ng-controller="IframeCntl" src="{{ $currentIframe }}" frameborder="0" name="appiframe"></iframe>
        </div>
    </div>
</div>

@stop

@section('js')
<script type="text/javascript" data-main="{{ asset('packages/arx/require/arxmin.js') }}" src="{{ asset('packages/requirejs/require.js') }}"></script>
@stop