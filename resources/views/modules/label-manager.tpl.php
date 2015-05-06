@extends('arxmin::layouts.admin')

@section('content')
<div id="container" ng-controller="labelmanagerController">
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4>Label <span class="semi-bold">Editor</span></h4>
                </div>
                <div class="grid-body ">
                    <table id="module-labelmanager" class="display table datatable arx-table table-bordered table-hover table-condensed" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>-</th>
                            <th>Key</th>
                            <th width="100%">en</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@parent
<?php
echo Asset::css([
    $theme_url."/plugins/datatables/css/jquery.dataTables.css",
    $theme_url."/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
    $theme_url."/plugins/datatables-responsive/css/datatables.responsive.css",
    $theme_url."/plugins/jquery-table-editor/examples/plugins/TableTools/css/dataTables.tableTools.css",
    $theme_url."/plugins/jquery-table-editor/dist/css/jquery-table-editor.css",
]);
?>

<style>
    table.dataTable tr td:first-child { text-align: center; } table.dataTable tr td:first-child:before { content: "\f096"; /* fa-square-o */ font-family: FontAwesome; } table.dataTable tr.selected td:first-child:before { content: "\f046"; /* fa-check-square-o */ } table.dataTable tr td.dataTables_empty:first-child:before { content: ""; }
</style>
@stop

@section('js')
<script data-main="<?php echo $theme_url; ?>/js/components/labelmanager" src="<?php echo $theme_url; ?>/js/vendor/require.js"></script>
@stop