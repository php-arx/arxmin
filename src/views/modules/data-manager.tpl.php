@extends('arxmin::layouts.admin')

<?php
/**
 * Loader Config
 */
Arxmin::loadPlugin('jquery-ui', 'xeditable');

$table = 'data';

$structure = [
    'id',
    'title',
    'slug',
    'type',
    'created_at',
    'updated_at',
];
?>

@section('content')

<div id="container" ng-app="labelApp" ng-controller="labelCtrl">

    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4><?php echo ucfirst($this->title) ?></h4>
                </div>

                <div class="grid-body ">

                    <table id="module-labelmanager" class="display table datatable arx-table table-bordered table-hover table-condensed" cellspacing="0" width="100%">
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
    Arxmin::getThemeUrl()."/plugins/jquery-datatable/css/jquery.dataTables.css",
    Arxmin::getThemeUrl()."/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
    Arxmin::getThemeUrl()."/plugins/datatables-responsive/css/datatables.responsive.css",
    Arxmin::getThemeUrl()."/plugins/jquery-table-editor/examples/plugins/TableTools/css/dataTables.tableTools.css",
    Arxmin::getThemeUrl()."/plugins/jquery-table-editor/dist/css/jquery-table-editor.css",
]);
?>

<style>
    table.dataTable tr td:first-child { text-align: center; } table.dataTable tr td:first-child:before { content: "\f096"; /* fa-square-o */ font-family: FontAwesome; } table.dataTable tr.selected td:first-child:before { content: "\f046"; /* fa-check-square-o */ } table.dataTable tr td.dataTables_empty:first-child:before { content: ""; }
</style>
@stop

@section('js')
@parent
<?php
echo Asset::js([
    //Arxmin::getThemeUrl()."/plugins/datatables-responsive/js/lodash.min.js",
    Arxmin::getThemeUrl()."/plugins/datatables/media/js/jquery.dataTables.js",
    Arxmin::getThemeUrl()."/plugins/TableTools/js/dataTables.tableTools.js",
    //Arxmin::getThemeUrl()."/plugins/datatables-responsive/js/datatables.responsive.js",
    Arxmin::getThemeUrl()."/plugins/jquery-table-editor/dist/js/jquery-table-editor.js",
    //Arxmin::getThemeUrl()."/plugins/angular-datatables/dist/angular-datatables.js",
]);
?>

<script>

    var app = angular.module('labelApp', []);

    app.controller('labelCtrl', function ($scope) {



    })
</script>


<script type="text/javascript" language="javascript" class="init">

    var editor; // use a global for the submit and return data rendering in the examples

    $(document).ready(function() {

        editor = new $.fn.dataTable.Editor( {
            ajax: {
                create: {
                    type: 'POST',
                    url:  '<?php echo Arxmin::api($table) ?>'
                },
                edit: {
                    type: 'PUT',
                    url:  '<?php echo Arxmin::api($table.'/_id_') ?>'
                },
                remove: {
                    type: 'DELETE',
                    url:  '<?php echo Arxmin::api($table.'/_id_') ?>'
                }
            },
            table: "#module-labelmanager",
            fields: [
            <?php
                $i = 0;
                foreach($structure as $name){
                    echo ($i ?',':''). '{"label" : "'.$name.'", "name" : "'.$name.'"}';
                    $i++;
                }
            ?>
            ]
        } );

        // Activate an inline edit on click of a table cell
        $('#module-labelmanager').on( 'click', 'tbody td:not(:first-child)', function (e) {
            editor.inline( this );
        });

        $('#module-labelmanager').DataTable( {
            dom: "Tfrtip",
            ajax: "<?php echo Arxmin::api($table.'?format=datatable&type='.Input::get('type')) ?>",
            columns: [
                { data: null, defaultContent: '', orderable: false }
                <?php
                    $i = 1;
                    foreach($structure as $key){
                        echo ($i ?',':''). '{"data" : "'.$key.'"}';
                        $i = 1;
                    }
                ?>
                ,
                {
                    "aTargets": [1],
                    "mData": null,
                    "mRender": function(data, type, full){
                        //console.log(data, type, full);
                        return '<a class="btn btn-default" href="data-manager/edit/'+data.id+'"><i class="fa fa-pencil"></i></a>';
                    }
                }
            ],
            tableTools: {
                sRowSelect: "os",
                aButtons: [
                    { sExtends: "editor_create", editor: editor },
                    { sExtends: "editor_remove", editor: editor }
                ]
            }
        });
    } );
</script>
@stop