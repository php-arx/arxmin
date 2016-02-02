@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="container" ng-controller="tablemanagerController as tablemanager">

        <div class="row">
            <div class="col-sm-12">
                <div class="grid simple">
                    <div class="grid-title">
                        <h4><?php echo ucfirst($this->title) ?></h4>
                    </div>
                    <div class="grid-body">

                        <table id="module-tablemanager" class="display table datatable arx-table table-bordered table-hover table-condensed" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <?php foreach($structure as $key): ?>
                                    <th>
                                        <?php echo $key ?>
                                    </th>
                                <?php endforeach; ?>
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
            Arxmin::url()."/plugins/datatables/css/jquery.dataTables.css",
            Arxmin::url()."/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
            Arxmin::url()."/plugins/datatables-responsive/css/datatables.responsive.css",
            Arxmin::url()."/plugins/jquery-table-editor/examples/plugins/TableTools/css/dataTables.tableTools.css",
            Arxmin::url()."/plugins/jquery-table-editor/dist/css/jquery-table-editor.css",
    ]);
    ?>
    <style>
        table.dataTable tr td:first-child { text-align: center; } table.dataTable tr td:first-child:before { content: "\f096"; /* fa-square-o */ font-family: FontAwesome; } table.dataTable tr.selected td:first-child:before { content: "\f046"; /* fa-check-square-o */ } table.dataTable tr td.dataTables_empty:first-child:before { content: ""; }
    </style>
@stop

@section('js')

@stop