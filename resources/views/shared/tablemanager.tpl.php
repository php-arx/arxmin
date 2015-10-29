@extends('arxmin::layouts.admin')

@section('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
@parent
@stop

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <h3><?php echo $this->title; ?></h3>
    </div>
    <div class="box">
        <?= $grid; ?>
    </div>
</div>
@stop

@section('js')
@parent
@stop