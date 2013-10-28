@extends('arxmin::html')

@section('head')
    @parent
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.5/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('js')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.5/bootstrap-editable/js/bootstrap-editable.min.js"></script>
@stop

@section('body')

<div class="container arx-container">
<div class="row">


<div class="column col-sm-2 well arx-sidebar affix-top">
    <h3>{{$title}}</h3>
    <ul class="nav">
        @if(is_array($tables))
            @foreach($tables as $key=>$name)
                <li><a href="{{ $linkMenu.$name }}">{{ $name }}</a></li>
            @endforeach
        @endif
    </ul>
</div>

<div class="col-sm-10 arx-content">
    <ul class="breadcrumb">
        <li><a href="#">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="#">Lang</a></li>
    </ul>

    <div class="row">

        @if(isset($data) && is_array($data) )
            @foreach($data as $isocode => $file)
                <div class="column col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $isocode }} Lang</h3>

                            <div class="btn-group">
                                <a class="btn btn-link" href="#"><i class="icon-move"></i></a>
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                            </div>
                        </div>
                        <div class="panel-body collapse in" id="collapse1">
                            <div class="accordion" id="accordion2">
                                @foreach($file as $key=>$value)

                                <?php

                                    $key = str_replace('.php', '', $key);

                                ?>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#{{$key}}">{{ $key }}</a>

                                    </div>
                                    <div id="{{ $key }}" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="col-2">Unique key</th>
                                                        <th>Value</th>
                                                        <th class="col-2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($value as $key2=>$value2)

                                                    @if(is_array($value2))

                                                        @foreach($value2 as $key3=>$value3)
                                                            @if(is_array($value3))

                                                            @foreach($value3 as $key4=>$value4)
                                                            <tr>
                                                                <td>{{ $key }}.{{ $key2 }}.{{$key3}}.{{$key4}}</td>
                                                                <td>{{$value4}}</td>
                                                                <td>-</td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td>{{ $key }}.{{ $key2 }}.{{$key3}}</td>
                                                                <td>{{$value3}}</td>
                                                                <td>-</td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td>{{$key.'.'.$key2}}</td>
                                                            <td>{{$value2}}</td>
                                                            <td>-</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!--/ .panel -->
            @endforeach
        @endif


        <div class="column col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon-chevron-sign-down"></i> Lang Editor</h3>

                    <div class="btn-group">
                        <a class="btn btn-link" href="#"><i class="icon-move"></i></a>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1"><i class="icon-caret-down"></i> <i class="icon-caret-up"></i></button>
                    </div>
                </div>
                <div class="panel-body collapse in" id="collapse1">
                    <h4>Lang editor panel</h4>

                    {{ Form::open() }}

                    <?php
                        Form::macro('input', function($name, $value){

                        });
                    ?>


                    {{ Form::close() }}

                </div>
            </div><!--/ .panel -->
        </div>
        </div>
    </div>
</div>
</div>
</div>
@stop