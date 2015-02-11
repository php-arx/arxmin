@extends('arx::html')

@section('head')
    @parent
    @section('css')
    <link rel="stylesheet" href="<?= url('/packages/arx/arxmin/dist/css/arxmin-combined.css') ?>" />
    <?= Hook::output('css') ?>
    @show
@stop

@section('js')
    <script type="text/javascript" src="<?= url('/packages/arx/arxmin/dist/js/arxmin-combined.js') ?>"></script>
    <?= Hook::output('js') ?>
@stop