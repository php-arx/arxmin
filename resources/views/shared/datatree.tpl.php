@extends('arxmin::layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="box">
            <div class="box-body">
                <?= $tree; ?>
            </div>
        </div>
    </div>
@stop

@section('css')
@parent
<?= Rapyd::styles() ?>
@stop

@section('js')
@parent
<?= Rapyd::scripts() ?>
@stop