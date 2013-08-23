@extends('arxmin::layouts.html')

@section('body')

<div class="container arx-container">
    <div class="row">
        <div class="col-2 hidden-print arx-sidebar">
            <div data-spy="affix" data-offset-bottom="50" data-offset-top="50">
                <ul class="nav nav-clean">
<!--                    <li>
                        <button class="btn btn-link" data-toggle="collapse" data-target="#yourstuff">Your stuff <i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>

                        <ul class="nav collapse in" id="yourstuff">
                            <li>
                                <a href="./dashboard.html" target="appiframe"><i class="icon-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="./forms-elements.html" target="appiframe"><i class="icon-tasks"></i> Forms elements</a>
                            </li>
                            <li>
                                <a href="./ui-widgets.html" target="appiframe"><i class="icon-tasks"></i> UI Widgets</a>
                            </li>
                            <li>
                                <a href="./calendar.html" target="appiframe"><i class="icon-tasks"></i> Calendar</a>
                            </li>
                            <li>
                                <a href="./charts.html" target="appiframe"><i class="icon-tasks"></i> Charts</a>
                            </li>
                            <li>
                                <a href="./settings.html" target="appiframe"><i class="icon-tasks"></i> Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li>

                    </li>-->


                    @foreach($menu as $key => $link)
                        @if(isset($link['children']))
                            <li>
                                <button class="btn btn-link" data-toggle="collapse" data-target="#{{$key}}"><i class="icon-home"></i> {{ $link['name'] }} <i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                                <ul class="nav collapse in" id="{{$key}}">
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
        <div class="col-10 arx-content">
            <iframe ng-controller="IframeCntl" src="{{ $currentIframe }}" frameborder="0" name="appiframe"></iframe>
        </div>
    </div>
</div>

@stop