
angular.module('datamanager')
.controller('datamanagerController', datamanagerController);


datamanagerController.$inject = [
    '$window',
    '$scope'
];


function datamanagerController($window, $scope) { console.log('-> datamanagerController');

    var __app = window.__app;

    $scope = angular.extend($scope, __app.scope || {});

    var editor;

    editor = new $.fn.dataTable.Editor( {
        ajax: {
            create: {
                type: 'POST',
                url:  "http://loc.arx-contrib.com/arxmin/api/v1/data"
            },
            edit: {
                type: 'PUT',
                url:  "http://loc.arx-contrib.com/arxmin/api/v1/data/_id_"
            },
            remove: {
                type: 'DELETE',
                url:  "http://loc.arx-contrib.com/arxmin/api/v1/data/_id_"
            }
        },
        table: "#module-datamanager",
        fields: [
            {"label" : "id", "name" : "id"},
            {"label" : "title", "name" : "title"},
            {"label" : "slug", "name" : "slug"},
            {"label" : "type", "name" : "type"},
            {"label" : "created_at", "name" : "created_at"},
            {"label" : "updated_at", "name" : "updated_at"}
        ]
    } );

    // Activate an inline edit on click of a table cell
    $('#module-datamanager').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    });

    $('#module-datamanager').DataTable( {
        dom: "Tfrtip",
        ajax: "http://loc.arx-contrib.com/arxmin/api/v1/data?format=datatable&type="+$scope.type,
        columns: [
            { data: null, defaultContent: '', orderable: false },
            {"data" : "id"},
            {"data" : "title"},
            {"data" : "slug"},
            {"data" : "type"},
            {"data" : "created_at"},
            {"data" : "updated_at"}                ,
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
}
