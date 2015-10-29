@extends('arxmin::layouts.admin')

@section('css')
@parent
@stop

@section('content')
<div class="container-fluid">
    <div class="box">
        @if($grid->title)
        <div class="box-header">
            <h3 class="box-title"><?= $grid->title; ?></h3>
        </div>
        @endif
        <div class="box-body">
            <?= $grid; ?>
        </div>
    </div>
</div>
@stop

@section('js')
@parent
@stop