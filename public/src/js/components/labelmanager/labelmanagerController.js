/**
 * MainController
 */
angular.module('labelmanager')
.controller('labelmanagerController', labelmanagerController);


labelmanagerController.$inject = [
    '$window',
    '$scope'
];

function labelmanagerController($window, $scope) {

    $scope.langs = window.__app.langs || ["en"];

    var editor;

    var config = window.__app;

    editor = new $.fn.dataTable.Editor({
        ajax: {
            create: {
                type: 'POST',
                url:  window.__app.ajax.create.url+'/new/_id_'
            },
            edit: {
                type: 'PUT',
                url:  window.__app.ajax.update.url+'/_id_'
            },
            remove: {
                type: 'DELETE',
                url:  window.__app.ajax.delete.url+'/_id_'
            }
        },
        table: "#module-labelmanager",
        fields: [
            {label: "ref", name: "ref" },
            {"label" : "en", "name" : "en"}
        ]
    });

    // Activate an inline edit on click of a table cell
    $('#module-labelmanager').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    });

    $('#module-labelmanager').DataTable( {
        dom: "Tfrtip",
        ajax: config.base_url + "/arxmin/api/v1/labels?format=datatable",
        columns: [
            { data: null, defaultContent: '', orderable: false },
            {"data" : "ref"},
            {"data" : "en"}
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