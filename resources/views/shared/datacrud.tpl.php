@extends('arxmin::layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="box">
        @if($form->title)
        <div class="box-header">
            <h3 class="box-title"><?= $form->title; ?></h3>
        </div>
        @endif
        <div class="box-body">
            <?= $form; ?>
        </div>
    </div>
</div>
@stop