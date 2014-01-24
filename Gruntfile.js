
module.exports = function(grunt) {
    'use strict';

    grunt.initConfig({
        /**
         * We read in our `package.json` file so we can access the package name and
         * version. It's already there, so we don't repeat ourselves here.
         */
        pkg: grunt.file.readJSON('package.json'),


        /**
         * The banner is the comment that is placed at the top of our compiled
         * source files. It is first processed as a Grunt template, where the `<%=`
         * pairs are evaluated based on this very configuration object.
         */
        meta: {
            banner: '/**\n * <%= pkg.name %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n * <%= pkg.homepage %>\n *\n * Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>\n * Licensed <%= pkg.licenses.type %> <<%= pkg.licenses.url %>>\n */\n'
        }, // meta


        /**
         * The directories to delete when `grunt clean` is executed.
         */
        clean: {
            css: [
//                '../../../public/packages/arxmin/css/plugins.css',
//                '../../../public/packages/arxmin/css/arx.css',
            ],
            js: [
                'src/assets/js/app-generated.js',

//                '../../../public/packages/arxmin/js/plugins.js',
//                '../../../public/packages/arxmin/js/arx.js'
            ]
        }, // clean


        /**
         * `jshint` defines the rules of our linter as well as which files we
         * should check. This file, all javascript sources, and all our unit tests
         * are linted based on the policies listed in `options`. But we can also
         * specify exclusionary patterns by prefixing them with an exclamation
         * point (!); this is useful when code comes from a third party but is
         * nonetheless inside `src/`.
         */
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            gruntfile: ['Gruntfile.js'],
            main: [
                '!src/assets/js/*-combined.js',
                '!../../../public/packages/arxmin/js/*.js'
            ]
        },


        /**
         * The `copy` task just copies files from A to B. We use it here to copy
         * our project assets (images, fonts, etc.)
         */
        // @TODO
        copy: {
            // plugins: {
            //     files: [
            //         {
            //             src: [
            //                 'public/packages/'
            //             ],
            //             dest: 'public/assets/',
            //             cwd: '.',
            //             expand: true
            //         }
            //     ]
            // }, // plugins

            // main: {
            //     files: [
            //         {
            //             src: [ 'app/' ],
            //             dest: 'public/assets/',
            //             cwd: '.',
            //             expand: true,
            //             flatten: true
            //         }
            //     ]
            // } // main
        }, // copy


        /**
         * `grunt concat` concatenates multiple source files into a single file.
         * We use it to prepare files in dev statement
         */
        concat: {
            options: {
                separator: ';',
                stripBanners: true
            },

            plugins: {
                src: [
                    '/public/packages/jquery/jquery.js',
                    '/public/packages/bootstrap/dist/js/bootstrap.js',
                    '/public/packages/angular/angular.js',
                    '/public/packages/angular-ui/angular-ui.js',
                    '/public/packages/angular-ui-bootstrap/dist/ui-bootstrap-0.9.0.js',
                    '/public/packages/angular-ui-bootstrap/dist/ui-bootstrap-tpls-0.9.0.js',
                ],
                dest: 'web/assets/js/plugins.js'
            }, // plugins

            main: {
                options: {
                    banner: '<%= meta.banner %>\n\n(function (window, angular, $, undefined) {\n',
                    footer: '\n}) (window, window.angular, window.jQuery);'
                },
                src: [
                    'src/assets/js/scripts.js',
                    'src/assets/js/app.js',
                    'src/assets/js/services.js',
                    'src/assets/js/controllers.js',
                    'src/assets/js/filters.js',
                    'src/assets/js/directives.js',
                ],
                dest: '../../../public/packages/arxmin/js/arx.js'
            } // main
        }, // concat


        /**
         * `ng-min` annotates the sources before minifying. That is, it allows us
         * to code without the array syntax.
         */
        ngmin: {
            main: {
                files: [
                    {
                        cwd: 'src/assets/js',
                        src: ['*.js'],
                        expand: true,
                        dest: 'src/assets/js/app-generated.js'
                    }
                ]
            } // main
        }, // ngmin


        /**
         * Minify the sources!
         */
        uglify: {
            plugins: {
                files: {
                    '../../../public/packages/arxmin/js/plugins.js': [
                        '/public/packages/jquery/jquery.js',
                        '/public/packages/bootstrap/dist/js/bootstrap.js',
                        '/public/packages/angular/angular.js',
                        '/public/packages/angular-ui/angular-ui.js',
                        '/public/packages/angular-ui-bootstrap/dist/ui-bootstrap-0.9.0.js',
                        '/public/packages/angular-ui-bootstrap/dist/ui-bootstrap-tpls-0.9.0.js',
                    ]
                }
            }, // plugins

            main: {
                options: {
                    banner: '<%= meta.banner %>\n\n(function (window, angular, $, undefined) {',
                    footer: '}) (window, window.angular, window.jQuery);',
                    report: 'min'
                },
                files: {
                    '../../../public/packages/arxmin/js/arx.js': [
                        'src/assets/js/scripts.js',
                        'src/assets/js/app.js',
                        'src/assets/js/services.js',
                        'src/assets/js/controllers.js',
                        'src/assets/js/filters.js',
                        'src/assets/js/directives.js',
                    ]
                }
            } // main
        }, // uglify


        /**
         * `recess` handles our LESS compilation and uglification automatically.
         */
        recess: {
            plugins: {
                options: {
                    compile: true,
                    compress: true
                },
                files: {
                    '../../../public/packages/arxmin/css/plugins.css': [
                        'src/assets/less/plugins.less'
                    ]
                }
            }, // plugins

            main: {
                options: {
                    banner: '<%= meta.banner %>',
                    compile: true,
                    compress: true
                },
                files: {
                    '../../../public/packages/arxmin/css/arx.css': [
                        'src/assets/less/app.less'
                    ]
                }
            } // main
        }, // recess


        dalek: {
            options: {
                browser: ['phantomjs'],
                reporter: ['console', 'html'],
                dalekfile: false,
                advanced: {
                    'html-reporter': {
                        dest: 'tests/reports'
                    }
                }
            },

            main: {
                src: ['tests/test-*.js']
            }
        }, // dalek


        watch: {
            options: {
                livereload: true
            },

            /**
             * When the Gruntfile changes, we just want to lint it. In fact, when
             * your Gruntfile changes, it will automatically be reloaded!
             */
            gruntfile: {
                files: 'Gruntfile.js',
                tasks: ['jshint:gruntfile', 'shell:done'],
                options: {
                    livereload: false
                }
            }, // gruntfile

            /**
             * When the CSS files change, we need to compile and minify them.
             */

            less: {
                files: [
                    'src/assets/less/*.less'
                ],
                tasks: [/*'copy',*/ 'recess', 'shell:done']
            },

            /**
             * When our JavaScript source files change.
             * In dev, we only concat files.
             */
            js: {
                files: [
                    'src/assets/js/*.js'
                ],
                tasks: ['jshint:main', /*'copy',*/ 'concat', 'shell:done']
            }
        }, // watch


        shell: {
            done: {
                command: 'terminal-notifier -message "Bazinga! Grunt tasks done!" -title "Gruntfile.js" -sound Pop'
            }
        }, // shell


        connect: {
            server: {
                options: {
                    port: 8800,
                    base: '.'
                }
            }
        }, // connect
    });

    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);


    // -- Tasks


    /**
     * Only tests
     */
    grunt.registerTask('test', ['dalek']);

    /**
     * Only CSS
     */
    grunt.registerTask('css', [
        'clean:css',
        // 'copy',
        'recess',
        'shell:done'
    ]);

    /**
     * Only JS
     */
    grunt.registerTask('js', [
        'clean:js',
        // 'copy',
        'ngmin',
        'concat',
        'shell:done'
    ]);

    /**
     * Dev is the regular watch tasks
     */
    grunt.registerTask('dev', [
        'clean',
        'jshint',
        // 'copy',
        'recess',
        'ngmin',
        'concat',
        'shell:done',

        'connect',
        'watch'
    ]);

    /**
     * The default task is to build and compile.
     */
    grunt.registerTask('default', [
        'clean',
        // 'copy',
        'recess',
        'ngmin',
        'uglify',
        'dalek',
        'shell:done'
    ]);


    grunt.event.on('watch', function (action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });

};
