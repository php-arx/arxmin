@extends('arxmin::layouts.admin')

<?php

//$ngapp = "sidebar";

/**
 * Loader Config
 */
//Arxmin::loadPlugin('jquery-ui', 'xeditable');

$table = 'data';

$structure = [
    'id',
    'title',
    'slug',
    'type',
    'created_at',
    'updated_at',
];

Hook::put('__app.scope.structure', $structure);
Hook::put('__app.scope.type', Input::get('type', 'page'));
?>

@section('content')
<div id="container" ng-controller="datamanagerController as datamanager">
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4><?php echo ucfirst($this->title) ?></h4>
                </div>

                <div class="grid-body ">

                    <table id="module-datamanager" class="display table datatable arx-table table-bordered table-hover table-condensed" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>

                            </th>
                            @foreach($structure as $key)
                                <th>
                                    <?php echo $key ?>
                                </th>
                            @endforeach
                            <th></th>
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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
<script data-main="<?php echo $theme_url; ?>/js/components/datamanager" src="<?php echo $theme_url; ?>/js/vendor/require.js"></script>
@stop
