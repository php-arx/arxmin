
angular.module('formmanager')
.controller('formmanagerController', formmanagerController);


formmanagerController.$inject = [
    '$window',
    '$scope'
];


function formmanagerController($window, $scope) { console.log('-> formmanagerController');

    var __app = window.__app;

    $scope = angular.extend($scope, __app.scope || {});

    var editor;

    console.log(__app);

    /**
     * Build columns
     *
     * @type {{data: null, defaultContent: string, orderable: boolean}[]}
     */
    $scope.columns = [
        { data: null, defaultContent: '', orderable: false }
    ];

    for(key in __app.columns){
        $scope.columns.push(__app.columns[key]);
    }

    $scope.columns.push({
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full){
            /**
             * @todo a way to send button tool
             */
            return '<a class="btn btn-default" href="forms/edit/'+data.id+'"><i class="fa fa-pencil"></i></a>';
        }
    });

    console.log($scope.columns);

    editor = new $.fn.dataTable.Editor( {
        ajax: {
            create: {
                type: 'POST',
                url:  __app.ajax.create.url+'/_id_'
            },
            edit: {
                type: 'PUT',
                url:  __app.ajax.update.url+'/_id_'
            },
            remove: {
                type: 'DELETE',
                url: __app.ajax.delete.url+'/_id_'
            }
        },
        table: "#module-formmanager",
        fields: __app.fields
    } );

    // Activate an inline edit on click of a table cell
    $('#module-formmanager').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    });

    $('#module-formmanager').DataTable( {
        dom: "Tfrtip",
        ajax: __app.ajax.read.url,
        columns: $scope.columns,
        tableTools: {
            sRowSelect: "os",
            aButtons:[
                { sExtends: "editor_create", editor: editor },
                { sExtends: "editor_remove", editor: editor }
            ]
        }
    });
}
