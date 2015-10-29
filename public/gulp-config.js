module.exports = {
    /**
     * File paths configuration
     */
    src_dir: 'src', // This is your work folder when magic happens
    public_dir: 'dist', // This is the destinary folders where files are compiled or processed
    pkg_dir: 'bower_components', // This is the bower directory when bower copy the files
    plugins_dir: 'dist/plugins', // This is where plugins where copied
    js_dir: 'js', // default js folder name, you can rename it "scripts" if you want
    css_dir: 'css', // default css folder name, you can rename it "stylesheets" if you want
    img_dir: 'img', // default img folder name, you can rename it "images" if you want
    fonts_dir: 'fonts', // default fonts folder name, you can rename it "fontzy" if you want
    require_mode: 'browserify', // requirejs|browserify

    /**
     * Main files that you want concatenate and compress in one file
     *
     */
    main_files: {

        less: {
            /**
             * Here you can put your main stylesheets
             *
             * For perf reason is better to import css inside one main.scss
             *
             */
            arxmin: [
                '<%= src_dir  %>/less/arxmin.less'
            ],

            plugins: [
                '<%= src_dir  %>/less/plugins.less'
            ],

            'skins/': [
                '<%= src_dir  %>/less/skins/*.less'
            ]
        },

        /*
         // Todo => move project to Sass
         scss: {
         *//**
         * Here you can put your main stylesheets
         *
         * For perf reason is better to import css inside one main.scss
         *
         *//*
         arxmin : [
         '<%= src_dir  %>/scss/arxmin.scss'
         ]
         },*/

        js: {
            /**
             * Here you can put the main plugins that you use everywhere
             *
             * It will be concatened and compressed in one file
             *
             * For debug reason is more convenient to separate plugins from your own code =>
             *
             * it will create a plugins.js and main.js that you need to add to your html page
             */
            plugins: [
                "<%= pkg_dir %>/jquery/dist/jquery.min.js",
                "<%= pkg_dir %>/bootstrap/dist/js/bootstrap.min.js",
                "<%= pkg_dir %>/angular/angular.js"
            ],

            /**
             * Here you can put your main script
             */
            arxmin: [
                '<%= src_dir  %>/js/arxmin.js'
            ]
        },

        /**
         * Extra folders that you need to process
         *
         * By default if you have for example : components/home/home.js in your src_folder
         * => it will create a components/home.js in the public dir
         */
        js_folders: {
            "components": "*",
            "shared": "*"
        },

        fonts: [
            '<%= pkg_dir %>/bootstrap-sass-official/assets/fonts/bootstrap/*',
            '<%= pkg_dir %>/font-awesome/fonts/*'
        ],

        img: [
            //example : 'vendor/arx/core/public/dist/img/arx-logo.png'
        ],

        /**
         * Extra folders that you need to copy inside
         */
        copy: {
            /*'docs' : [
             'vendor/arx/core/README.md'
             ]*/
        }
    },

    /**
     * Extra Plugin Files that needs to be copied in public folder and are optionnal
     *
     * For example file that is used only for retro-compability or files that need link to extra assets or files used in
     * Require.js Flow
     *
     */
    plugin_files: {

        /**
         * Copy plugins to the public path in a public_dir/plugins folders
         *
         * key = name of the folders
         * value = file(s) or folders to copy
         */
        copy: {
            'modernizr': [
                '<%= pkg_dir %>/modernizr/modernizr.js'
            ],
            'html5shiv': [
                '<%= pkg_dir %>/html5shiv/dist'
            ]
        },

        /**
         * Folder that will override default plugins folder
         */
        override_folder: '<%= src_dir  %>/plugins',

        /**
         * Declare your Require dependencies here if you want to use Browserify or RequireJs (Optionnal)
         */
        shim: {
            jquery: {
                path: 'bower_components/jquery/dist/jquery.js',
                deps:[],
                exports: 'jQuery'
            },
            angular: {
                path: 'bower_components/angular/angular.js',
                deps: ['jquery'],
                exports: 'angular'
            },
            bootstrap: {
                path: 'bower_components/bootstrap/dist/js/bootstrap.js',
                deps: ['jquery'],
                exports: 'bootstrap'
            },

            'spin': {
                path: 'dist/plugins/spin.js/spin',
                deps: [],
                exports: ''
            },
            'jquery-ui': {
                path: 'dist/plugins/jquery-ui/jquery-ui.min',
                deps: [],
                exports: ''
            },
            'datatables': {
                path: 'dist/plugins/datatables/js/jquery.dataTables.min',
                deps: [],
                exports: ''
            },
            'datatables-tabletools': {
                path: 'dist/plugins/datatables-tabletools/js/dataTables.tableTools',
                deps: [],
                exports: ''
            },
            'angular-datatables': {
                path: 'dist/plugins/angular-datatables/angular-datatables',
                deps: [],
                exports: ''
            },
            'jquery-table-editor': {
                path: 'dist/plugins/jquery-table-editor/js/jquery-table-editor',
                deps: [],
                exports: ''
            },
            'jquery-isotope': {
                path: 'dist/plugins/jquery-isotope/jquery.isotope',
                deps: [],
                exports: ''
            },
            'masonry': {
                path: 'dist/plugins/masonry/masonry.min',
                deps: [],
                exports: ''
            },
            'breakpoints': {
                path: 'dist/plugins/breakpoints/breakpoints',
                deps: [],
                exports: ''
            },
            'ckeditor': {
                path: 'dist/plugins/ckeditor/ckeditor',
                deps: [],
                exports: ''
            },
            'lodash': {
                path: 'dist/plugins/lodash/lodash',
                deps: [],
                exports: ''
            },


            // Angular package @deprecated

            'angular-base64': {
                path: 'dist/plugins/angular-base64/angular-base64.min',
                deps: [],
                exports: ''
            },
            'angular-bootstrap': {
                path: 'dist/plugins/angular-bootstrap/ui-bootstrap.min',
                deps: [],
                exports: ''
            },
            'angular-bootstrap-tpls': {
                path: 'dist/plugins/angular-bootstrap/ui-bootstrap-tpls.min',
                deps: [],
                exports: ''
            },
            'angular-form-builder': {
                path: 'dist/plugins/angular-form-builder/dist/angular-form-builder',
                deps: ['angular-form-builder-components', 'angular-validator', 'angular-validator-rules'],
                exports: ''
            },
            'angular-form-builder-components': {
                path: 'dist/plugins/angular-form-builder/dist/angular-form-builder-components',
                deps: [],
                exports: ''
            },
            'angular-validator': {
                path: 'dist/plugins/angular-validator/dist/angular-validator',
                deps: [],
                exports: ''
            },
            'angular-validator-rules': {
                path: 'dist/plugins/angular-validator/dist/angular-validator-rules',
                deps: [],
                exports: ''
            },
            'angular-notify': {
                path: 'dist/plugins/angular-notify/angular-notify.min',
                deps: [],
                exports: ''
            },
            'angular-isotope': {
                path: 'dist/plugins/angular-isotope/angular-isotope.min',
                deps: [],
                exports: ''
            },
            'angular-storage': {
                path: 'dist/plugins/angular-storage/angular-storage.min',
                deps: [],
                exports: ''
            },
            'angular-ui-utils': {
                path: 'dist/plugins/angular-ui-utils/ui-utils.min',
                deps: [],
                exports: ''
            },
            'angular-ui-tree': {
                path: 'dist/plugins/angular-ui-tree/angular-ui-tree.min',
                deps: [],
                exports: ''
            },
            'famous': {
                path: 'dist/plugins/famous/famous-global',
                deps: [],
                exports: ''
            },
            'angular-famous': {
                path: 'dist/plugins/angular-famous/famous-angular',
                deps: [],
                exports: ''
            },
            'angular-strap': {
                path: 'dist/plugins/angular-strap/angular-strap.min',
                deps: [],
                exports: ''
            },
            'angular-strap-tpl': {
                path: 'dist/plugins/angular-strap/angular-strap.tpl.min',
                deps: [],
                exports: ''
            }
        }
    },

    /**
     * Files that will be watched
     */
    watch: {
        'css': [
            '<%= src_dir %>/scss/*.scss',
            '<%= src_dir %>/scss/**/*.scss'
        ],
        'js': [
            '<%= src_dir %>/js/*.js',
            '<%= src_dir %>/js/**/*.js'
        ],
        'dev': [
            './gulpfile.js',
            './gulp-config.js'
        ]
    },

    /**
     * Files that you want to check the change and that trig a LiveReload
     */
    livereload: [
        './example/*',
        './example/**/*',
        './<%= public_dir %>/css/*.css',
        './<%= public_dir %>/js/*.js'
    ]
};