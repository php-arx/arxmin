@extends('arxmin::layouts.admin')

@section('content')
<div id="container" class="page-container">
    <h2><?php echo $this->title; ?></h2>
    <div class="row-fluid">
        <?php echo $grid; ?>
    </div>
</div>
@stop

@section('css')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@parent
<?php
echo Asset::css([
    Arxmin::getThemeUrl()."/plugins/datatables/css/jquery.dataTables.css",
    Arxmin::getThemeUrl()."/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
    Arxmin::getThemeUrl()."/plugins/datatables-responsive/css/datatables.responsive.css",
    Arxmin::getThemeUrl()."/plugins/jquery-table-editor/examples/plugins/TableTools/css/dataTables.tableTools.css",
    Arxmin::getThemeUrl()."/plugins/jquery-table-editor/dist/css/jquery-table-editor.css",
]);
?>
@stop

@section('js')
<script data-main="<?php echo Arxmin::getThemeUrl(); ?>/js/shared/tablemanager" src="<?php echo Arxmin::getThemeUrl(); ?>/js/vendor/require.js"></script>
@stop