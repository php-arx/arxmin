@extends('layouts.admin')
<?php
$noheader = true;
$nosidebar = true;
?>
@section('content')
<div class="container"><br/><br/><br/><br/><br/>
    @if($response['data'])
    <div class="alert alert-success">
        <?php echo $response['msg'] ?>
    </div>
    @else
    <div class="alert alert-warning">
        <?php echo $response['msg'] ?>
    </div>
    @endif
</div>
@stop