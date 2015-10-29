@extends('arx::html')

@section('head')
    @parent
    @section('css')
    <link rel="stylesheet" href="<?= url('/packages/arx/arxmin/dist/css/plugins.css') ?>" />
    <link rel="stylesheet" href="<?= url('/packages/arx/arxmin/dist/css/arxmin.css') ?>" />
    <?= Hook::output('css') ?>
    @show
@stop

@section('js')
    <script type="text/javascript" src="<?= url('/packages/arx/arxmin/dist/js/plugins.js') ?>"></script>
    <script type="text/javascript" src="<?= url('/packages/arx/arxmin/dist/js/arxmin.js') ?>"></script>
    <?= Hook::output('js') ?>
@stop