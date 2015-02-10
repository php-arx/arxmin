module.exports = function (grunt) {

    'use strict';

    var taskConfig = {
        // Metadata
        pkg: grunt.file.readJSON('package.json'),

        bowerrc: grunt.file.readJSON('.bowerrc'),

        src: 'src', //Change the source that you need
        dist: 'dist', //Change this to publish where you want !
        bower_components : 'bower_components', //Change this change the general packages directory
        packages : '../../../../public/packages', //Change this change the general packages directory

        // Extra Plugins
        plugins : {
            "sass": [

            ],

            "uglify" : [

            ],

            "copy" : [

            ],

            "concat" : [

            ]
        },

        uglify: {
            options: {
                compress: false
            },
            arxmin: {
                files: {
                    '<%= dist %>/js/arxmin.js' : [
                        "<%= src %>/js/arxmin.js"
                    ]
                }
            } // arxmin
        }, // uglify

        sass : {

            main: {
                options: {
                    separator: '',
                    compress: false
                },
                files: {
                    '<%= dist %>/css/arxmin.css': [
                        "<%= src %>/scss/arxmin.scss"
                    ]
                }
            } // main
        }, // sass

        concat: {

            // CSS

            pluginscss: {
                options: {
                    separator: '\n',
                    stripBanners: true
                },
                src: [
                    "<%= dist %>/plugins/pace/pace-theme-flash.css",
                    "<%= dist %>/plugins/jquery-slider/css/jquery.sidr.light.css",
                    "<%= dist %>/plugins/boostrapv3/css/bootstrap.min.css",
                    "<%= dist %>/plugins/boostrapv3/css/bootstrap-theme.min.css",
                    "<%= dist %>/plugins/font-awesome/css/font-awesome.css",
                    "<%= dist %>/css/animate.min.css"
                ],
                dest: '<%= dist %>/css/plugins.css'
            },


            arxmincombinedcss: {
                options: {
                    separator: '\n',
                    stripBanners: true
                },
                src: [
                    '<%= dist %>/css/plugins.css',
                    '<%= dist %>/css/arxmin.css',
                    "<%= src %>/css/custom-icon-set.css"
                ],
                dest: 'dist/css/arxmin-combined.css'
            },

            // JS

            pluginsjs: {
                options: {
                    separator: ';\n',
                    stripBanners: true
                },
                src: [
                    "<%= dist %>/plugins/jquery-1.8.3.min.js",
                    "<%= bower_components %>/angular/angular.min.js",
                    "<%= dist %>/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js",
                    "<%= dist %>/plugins/boostrapv3/js/bootstrap.min.js",
                    "<%= dist %>/plugins/breakpoints.js",
                    "<%= dist %>/plugins/jquery-unveil/jquery.unveil.min.js",
                    "<%= dist %>/plugins/jquery-block-ui/jqueryblockui.js",
                    "<%= dist %>/plugins/jquery-slider/jquery.sidr.min.js",
                    "<%= dist %>/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                    "<%= dist %>/plugins/pace/pace.min.js",
                    "<%= dist %>/plugins/jquery-numberAnimate/jquery.animateNumbers.js",
                    "<%= dist %>/plugins/jquery-block-ui/jqueryblockui.js",
                    "<%= dist %>/plugins/jquery-slider/jquery.sidr.min.js",
                    "<%= dist %>/plugins/jquery-numberAnimate/jquery.animateNumbers.js",
                    "<%= dist %>/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                    "<%= dist %>/plugins/bootstrap-select2/select2.min.js"
                ],
                dest: '<%= dist %>/js/plugins.js'
            },
            arxmincombinedjs: {
                options: {
                    separator: ';\n',
                    stripBanners: true
                },
                src: [
                    '<%= dist %>/js/plugins.js',
                    '<%= dist %>/js/arxmin.js'
                ],
                dest: '<%= dist %>/js/arxmin-combined.js'
            }
        }, // concat

        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                '<%= src %>/js*//*.js',
                '!<%= dist %>/js*//*.min.js'
            ]
        }, // jshint


        watch: {
            sass: {
                files: [
                    '<%= src %>/scss/*.scss',
                    '<%= src %>/css/*.css'
                ],

                tasks: ['sass','concat', 'shell:done']
            },

            js: {
                files: [
                    '<%= jshint.all %>'
                ],

                tasks: ['uglify','concat','shell:done']
            },

            livereload : {

                options : {
                    livereload : true
                },
                files: [
                    '<%= dist %>/*/*.css',
                    '<%= dist %>/*/*.js',
                    'demo/*'
                ]
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
                    port: 8870,
                    base: '.'
                }
            }
        } // connect
    };


    grunt.initConfig(grunt.util._.extend(taskConfig));


    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);


    /**
     * Only CSS
     */
    grunt.registerTask('css', [
        'sass',
        'concat',
        'shell:done'
    ]);

    /**
     * Only JS
     */
    grunt.registerTask('js', [
        'uglify',
        'concat',
        'shell:done'
    ]);

    /**
     * Dev is the regular watch tasks
     */
    grunt.registerTask('dev', [
        'sass',
        'concat',
        'shell:done',
        'connect',
        'watch'
    ]);

    /**
     * The default task is to build and compile.
     */
    grunt.registerTask('default', [
        'sass',
        'uglify',
        'concat',
        'shell:done'
    ]);


    grunt.event.on('watch', function(action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });

};