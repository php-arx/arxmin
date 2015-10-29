angular.module('tablemanager')
.controller('tablemanagerController', tablemanagerController);


tablemanagerController.$inject = [
    '$window',
    '$scope'
];

function tablemanagerController($window, $scope) { console.log('-> tablemanagerController');

    var __app = window.__app;

    $scope = angular.extend($scope, __app.scope || {});

    var editor;

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
        "mRender": function(data){
            console.log(data);
            var html = _.template(__app.row_buttons || '<a class="btn btn-default" href="edit/<%= id %>"><i class="fa fa-pencil"></i></a>');
            html(data);
            return html(data);
        }
    });

    console.log(__app.ajax.read.url);

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
        table: "#module-tablemanager",
        fields: __app.fields
    } );

    // Activate an inline edit on click of a table cell
    $('#module-tablemanager').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    });

    $('#module-tablemanager').DataTable( {
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
