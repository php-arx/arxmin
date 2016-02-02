@extends('arxmin::layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="box">
            @if ($grid->title)
                <div class="box-header">
                    <h3 class="box-title"><?= $grid->title ?></h3>
                </div>
            @endif
            <div class="box-body">
                <?= $grid ?>
            </div>
        </div>
    </div>

</div>
@stop