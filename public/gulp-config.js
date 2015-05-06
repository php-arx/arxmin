/**
 * Assets configuration
 *
 */

module.exports = {

    pkg_name : 'arxmin',
    /**
     * File paths
     */
    src_dir: 'src',
    public_dir: 'dist',
    example_dir: 'example',
    pkg_dir: 'bower_components',
    workbench_dir: 'workbench',

    main_files : {
        sass : [
            '<%= src_dir %>/scss/<%= pkg_name %>.scss'
        ],
        js : [
            '<%= src_dir %>/js/**/*.js'
        ]
    },

    /**
     * Plugin Files
     */
    plugin_files: {

        fonts: [
            '<%= pkg_dir %>/bootstrap-sass-official/assets/fonts/bootstrap/*',
            '<%= pkg_dir %>/font-awesome/fonts/*',
        ],

        // Copy to public_dir {dist}/plugins
        copy: {
            'angular-base64': '<%= pkg_dir %>/angular-base64/angular-base64.min.js',
            'angular-bootstrap': [
                '<%= pkg_dir %>/angular-bootstrap/ui-bootstrap.min.js',
                '<%= pkg_dir %>/angular-bootstrap/ui-bootstrap-tpls.min.js',
            ],
            'angular-isotope': [
                '<%= pkg_dir %>/angular-isotope/dist/angular-isotope.js',
                '<%= pkg_dir %>/angular-isotope/dist/angular-isotope.min.js',
            ],
            'angular-notify': [
                '<%= pkg_dir %>/angular-notify/dist/angular-notify.min.js',
                '<%= pkg_dir %>/angular-notify/dist/angular-notify.min.css',
            ],
            'angular-storage': '<%= pkg_dir %>/a0-angular-storage/dist/angular-storage.min.js',
            'angular-ui-utils': '<%= pkg_dir %>/angular-ui-utils/ui-utils.min.js',
            'angular-ui-tree': '<%= pkg_dir %>/angular-ui-tree/dist',
            'spin.js': [
                '<%= pkg_dir %>/spin.js/spin.js',
                '<%= pkg_dir %>/spin.js/jquery.spin.js',
            ],
            'famous': [
                '<%= pkg_dir %>/famous/dist/famous-global.js',
            ],
            'angular-famous': [
                '<%= pkg_dir %>/famous-angular/dist/famous-angular.css',
                '<%= pkg_dir %>/famous-angular/dist/famous-angular.js',
                '<%= pkg_dir %>/famous-angular/dist/famous-angular.min.css',
                '<%= pkg_dir %>/famous-angular/dist/famous-angular.min.js'
            ],
            'angular-strap': [
                '<%= pkg_dir %>/angular-strap/dist/'
            ],
            'angular-motion' : [
                '<%= pkg_dir %>/angular-motion/dist/angular-motion.min.css'
            ]
            ,'jquery-ui' : [
                 '<%= pkg_dir %>/jquery-ui/jquery-ui.min.js'
                ,'<%= pkg_dir %>/jquery-ui/jquery-ui.js'
                ,'<%= pkg_dir %>/jquery-ui/themes/smoothness'
            ]
            ,'jquery-isotope' : [
                 '<%= pkg_dir %>/isotope/jquery.isotope.js'
            ]
            ,'datatables' : [
                 '<%= pkg_dir %>/datatables/media'
            ]
            ,'datatables-tabletools' : [
                 '<%= pkg_dir %>/datatables-tabletools'
            ]
            ,'angular-datatables' : [
                 '<%= pkg_dir %>/angular-datatables/dist'
            ]
            ,'ckeditor' : [
                 '<%= workbench_dir %>/ckeditor'
            ]
            ,'masonry' : [
                 '<%= pkg_dir %>/jquery-masonry'
            ]
            ,'fancybox' : [
                 '<%= pkg_dir %>/fancybox/source'
            ]
            ,'jsoneditor' : [
                 '<%= pkg_dir %>/jsoneditor'
            ]
            ,'breakpoints' : [
                 '<%= pkg_dir %>/jquery.breakpoints/breakpoints.js'
            ],

        },
        'css' : [
            "<%= public_dir %>/plugins/pace/pace-theme-flash.css",
            "<%= public_dir %>/plugins/jquery-slider/css/jquery.sidr.light.css",
            "<%= public_dir %>/plugins/boostrapv3/css/bootstrap.min.css",
            "<%= public_dir %>/plugins/boostrapv3/css/bootstrap-theme.min.css",
            "<%= public_dir %>/plugins/font-awesome/css/font-awesome.css",
            "<%= public_dir %>/css/animate.min.css"
        ],
        js: [
            '<%= pkg_dir %>/console-polyfill/index.js',

        ],
        vendor: [
            '<%= pkg_dir %>/requirejs/require.js',
            '<%= pkg_dir %>/jquery/dist/jquery.min.js',
            '<%= pkg_dir %>/jquery/dist/jquery.min.map',
            '<%= pkg_dir %>/angular/angular.min.js',
            '<%= pkg_dir %>/angular/angular.min.js.map',
            '<%= pkg_dir %>/bootstrap-sass-official/assets/javascripts/bootstrap.min.js',
        ]
    },

    livereload : [
        './<%= public_dir %>/css/**/*.css',
        './<%= public_dir %>/js/**/*.js',
        './<%= example_dir %>/**/*',
        './<%= example_dir %>/*',
        '../src/**/*.php'
    ]
};
