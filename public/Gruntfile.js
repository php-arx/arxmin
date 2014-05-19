module.exports = function (grunt) {
    'use strict';

    var taskConfig = {
        // Metadata
        pkg: grunt.file.readJSON('package.json'),

        bowerrc: grunt.file.readJSON('.bowerrc'),

        src: 'src', //Change the source that you need
        dist: 'dist', //Change this to publish where you want !
        packages : 'bower_components', //Change this change the general packages directory

        uglify: {
            options: {
                compress: false
            },
            arxmin: {
                files: {
                    '<%= dist %>/js/arxmin.js' : [
                        "<%= src %>/js/core.js"
                    ]
                }
            } // arxmin
        }, // uglify

        less: {
            plugins: {
                options: {
                    compress: true,
                    relativeUrls: true,
                    strictImports: true
                },
                files: {
                    '<%= dist %>/css/plugins.css': [
                        "<%= src %>/plugins/fullcalendar/fullcalendar.css",
                        "<%= src %>/plugins/pace/pace-theme-flash.css",
                        "<%= src %>/plugins/gritter/css/jquery.gritter.css",
                        "<%= src %>/plugins/bootstrap-datepicker/css/datepicker.css",
                        "<%= src %>/plugins/jquery-morris-chart/css/morris.css",
                        "<%= src %>/plugins/jquery-slider/css/jquery.sidr.light.css",
                        "<%= src %>/plugins/bootstrap-select2/select2.css",
                        "<%= src %>/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css",
                        "<%= src %>/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
                        "<%= src %>/plugins/boostrapv3/css/bootstrap.min.css",
                        "<%= src %>/plugins/boostrapv3/css/bootstrap-theme.min.css",
                        "<%= src %>/css/animate.min.css"
                    ]
                }
            }, // plugins

            main: {
                options: {
                    separator: '\n',
                    compress: true
                },
                files: {
                    '<%= dist %>/css/arxmin.css': [
                        "<%= src %>/less/style.less",
                        "<%= src %>/less/responsive.less"
                    ]
                }
            } // main
        }, // less

        concat: {

            // CSS

            pluginscss: {
                options: {
                    separator: '\n',
                    stripBanners: true
                },
                src: [
                    "<%= src %>/plugins/fullcalendar/fullcalendar.css",
                    "<%= src %>/plugins/pace/pace-theme-flash.css",
                    "<%= src %>/plugins/gritter/css/jquery.gritter.css",
                    "<%= src %>/plugins/bootstrap-datepicker/css/datepicker.css",
                    "<%= src %>/plugins/jquery-morris-chart/css/morris.css",
                    "<%= src %>/plugins/jquery-slider/css/jquery.sidr.light.css",
                    "<%= src %>/plugins/bootstrap-select2/select2.css",
                    "<%= src %>/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css",
                    "<%= src %>/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
                    "<%= src %>/plugins/boostrapv3/css/bootstrap.min.css",
                    "<%= src %>/plugins/boostrapv3/css/bootstrap-theme.min.css",
                    "<%= src %>/css/animate.min.css"
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
                    "<%= packages %>/jquery/jquery.js",
                    "<%= src %>/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js",
                    "<%= packages %>/angular/angular.min.js",
                    "<%= src %>/plugins/boostrapv3/js/bootstrap.min.js",
                    "<%= src %>/plugins/breakpoints.js",
                    "<%= src %>/plugins/jquery-unveil/jquery.unveil.min.js",
                    "<%= src %>/plugins/pace/pace.min.js",
                    "<%= src %>/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                    "<%= src %>/plugins/jquery-numberAnimate/jquery.animateNumbers.js",
                    "<%= src %>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js",
                    "<%= src %>/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                    "<%= src %>/plugins/jquery-block-ui/jqueryblockui.js",
                    "<%= src %>/plugins/bootstrap-select2/select2.min.js",
                    "<%= src %>/plugins/jquery-morris-chart/js/morris.min.js",
                    "<%= src %>/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js",
                    "<%= src %>/plugins/jquery-slider/jquery.sidr.min.js",
                    "<%= src %>/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js",
                    "<%= src %>/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js",
                    "<%= src %>/plugins/jquery-sparkline/jquery-sparkline.js",
                    "<%= src %>/plugins/jquery-flot/jquery.flot.min.js",
                    "<%= src %>/plugins/jquery-flot/jquery.flot.animator.min.js",
                    "<%= src %>/plugins/skycons/skycons.js"
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
            less: {
                files: [
                    '<%= src %>/less/*.less',
                    '<%= src %>/css/*.css'
                ],

                tasks: ['recess', 'shell:done']
            },

            js: {
                files: [
                    '<%= jshint.all %>'
                ],

                tasks: ['uglify', 'shell:done']
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
        'less',
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
        'less',
        'concat',
        'shell:done',
        'connect',
        'watch'
    ]);

    /**
     * The default task is to build and compile.
     */
    grunt.registerTask('default', [
        'less',
        'uglify',
        'concat',
        'shell:done'
    ]);


    grunt.event.on('watch', function(action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });

};