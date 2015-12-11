@extends('arxmin::layouts.admin')

@section('css')
@parent
<link rel="stylesheet" href="/packages/zofe/rapyd/assets/redactor/css/redactor.css"/>
<link rel="stylesheet" href="/packages/zofe/rapyd/assets/datepicker/datepicker3.css"/>
<link rel="stylesheet" href="/packages/zofe/rapyd/assets/datetimepicker/datetimepicker3.css"/>
<?= Rapyd::styles() ?>
@stop

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <h3><?php echo $this->title; ?></h3>
    </div>
    <div class="row">
        <?= $form; ?>
    </div>
</div>
@stop

@section('js')
@parent
<?= Rapyd::scripts() ?>
@stop