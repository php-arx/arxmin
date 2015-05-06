(function (requirejs) {
    'use strict';

    /**
     * loadCss
     *
     * @param url
     */
    function loadCss(url) {
        var link = document.createElement("link");
        link.type = "text/css";
        link.rel = "stylesheet";
        link.href = url;
        document.getElementsByTagName("head")[0].appendChild(link);
    }

    var config = {
        baseUrl: window.__base_url,


/*        Arxmin::getThemeUrl('/plugins').'/angular-form-builder/dist/angular-form-builder.js',
        Arxmin::getThemeUrl('/plugins').'/angular-form-builder/dist/angular-form-builder-components.js',
        Arxmin::getThemeUrl('/plugins').'/angular-validator/dist/angular-validator.js',
        Arxmin::getThemeUrl('/plugins').'/angular-validator/dist/angular-validator-rules.js',*/

        // alias libraries paths
        paths: {
             'angular':                  'vendor/angular.min'
            ,'angular-base64':           '../plugins/angular-base64/angular-base64.min'
            ,'angular-bootstrap':        '../plugins/angular-bootstrap/ui-bootstrap.min'
            ,'angular-bootstrap-tpls':   '../plugins/angular-bootstrap/ui-bootstrap-tpls.min'
            ,'angular-form-builder':   '../plugins/angular-form-builder/dist/angular-form-builder'
            ,'angular-form-builder-components':   '../plugins/angular-form-builder/dist/angular-form-builder-components'
            ,'angular-validator':   '../plugins/angular-validator/dist/angular-validator'
            ,'angular-validator-rules':   '../plugins/angular-validator/dist/angular-validator-rules'
            ,'angular-notify':           '../plugins/angular-notify/angular-notify.min'
            ,'angular-isotope':           '../plugins/angular-isotope/angular-isotope.min'
            ,'angular-storage':          '../plugins/angular-storage/angular-storage.min'
            ,'angular-ui-utils':         '../plugins/angular-ui-utils/ui-utils.min'
            ,'angular-ui-tree':         '../plugins/angular-ui-tree/angular-ui-tree.min'
            ,'famous':                     '../plugins/famous/famous-global'
            ,'angular-famous':           '../plugins/angular-famous/famous-angular'
            ,'angular-strap':           '../plugins/angular-strap/angular-strap.min'
            ,'angular-strap-tpl':           '../plugins/angular-strap/angular-strap.tpl.min'
            ,'bootstrap':                'vendor/bootstrap.min'
            ,'jquery':                   'vendor/jquery.min'
            ,'spin':                     '../plugins/spin.js/spin'
            ,'jquery-ui':                     '../plugins/jquery-ui/jquery-ui.min'
            ,'datatables':                     '../plugins/datatables/js/jquery.dataTables.min'
            ,'datatables-tabletools':                     '../plugins/datatables-tabletools/js/dataTables.tableTools'
            ,'angular-datatables':                     '../plugins/angular-datatables/angular-datatables'
            ,'core':                     'shared/core'
            ,'jquery-table-editor':                     '../plugins/jquery-table-editor/js/jquery-table-editor'
            ,'jquery-isotope':                     '../plugins/jquery-isotope/jquery.isotope'
            ,'masonry':                     '../plugins/masonry/masonry.min'
            ,'breakpoints':                     '../plugins/breakpoints/breakpoints'
            ,'ckeditor':                     '../plugins/ckeditor/ckeditor'
            // ...
        },

        // add module that does not support AMD out of the box in a SHIM
        shim: {
            angular: {
                deps: ['jquery'],
                exports: 'angular'
            },
            'angular-base64': {
                deps: [
                    'angular'
                ]
            },
            'angular-bootstrap': {
                deps: [
                    'angular'
                ]
            },
            'angular-form-builder' : {
                deps: [
                    'angular'
                ]
            },
            'angular-form-builder-components' : {
                deps: [
                    'angular-validator-rules',
                    'angular-form-builder'
                ]
            },
            'angular-validator' : {
                deps: [
                    'angular'
                ]
            },
            'angular-validator-rules' : {
                deps: [
                    'angular-validator'
                ]
            },
            'angular-isotope': {
                deps: [
                    'angular',
                    'jquery-isotope'
                ]
            },
            'angular-bootstrap-tpls': {
                deps: [
                    'angular-bootstrap'
                ]
            },
            'angular-strap': {
                deps: [
                    'angular'
                ]
            },
            'angular-strap-tpl': {
                deps: [
                    'angular-strap'
                ]
            },
            'angular-notify': {
                deps: [
                    'angular'
                ]
            },
            'angular-storage': {
                deps: [
                    'angular'
                ]
            },
            'angular-ui-utils': {
                deps: [
                    'angular'
                ]
            },
            'angular-famous': {
                deps: [
                    'angular',
                    'famous'
                ]
            },
            'angular-ui-tree': {
                deps: [
                    'angular'
                ],
                init : function(){
                    //loadCss(window.__base_url + '/../plugins/angular-ui-tree/angular-ui-tree.min.css')
                }
            },
            'jquery-ui': {
                deps: [
                    'jquery'
                ]
            },
            'jquery-isotope': {
                deps: [
                    'jquery'
                ]
            },
            bootstrap: {
                deps: ['jquery']
            },
            masonry : {
                deps: ['jquery']
            },
            breakpoints : {
                deps: ['jquery']
            },
            'spin': {
                exports: 'Spinner'
            },
            'jquery-table-editor': {
                deps: ['jquery', 'datatables', 'datatables-tabletools']
            },
            'ckeditor' : {
                exports: 'CKEDITOR',
                init : function(){
                    CKEDITOR.editorConfig = function( config ) {
                        config.filebrowserBrowseUrl = '/elfinder/ckeditor4';
                    };
                }
            }
            // ...
        },

        priority: [
            'jquery',
            'angular'
        ],

        // default load a module (kick start)
        deps: [
            'shared/core'
        ]
    };

    requirejs.config(config);
}) (window.require);
