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

        less: {

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
                    "<%= bower_components %>/datatables-tabletools/css/dataTables.tableTools.css",
                    "<%= dist %>/plugins/fullcalendar/fullcalendar.css",
                    "<%= dist %>/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css",
                    "<%= dist %>/plugins/pace/pace-theme-flash.css",
                    "<%= dist %>/plugins/gritter/css/jquery.gritter.css",
                    "<%= dist %>/plugins/bootstrap-datepicker/css/datepicker.css",
                    "<%= dist %>/plugins/jquery-morris-chart/css/morris.css",
                    "<%= dist %>/plugins/jquery-slider/css/jquery.sidr.light.css",
                    "<%= dist %>/plugins/bootstrap-select2/select2.css",
                    "<%= dist %>/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css",
                    "<%= dist %>/plugins/boostrap-checkbox/css/bootstrap-checkbox.css",
                    "<%= dist %>/plugins/boostrapv3/css/bootstrap.min.css",
                    "<%= dist %>/plugins/boostrapv3/css/bootstrap-theme.min.css",
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
                    "<%= bower_components %>/jquery/jquery.js",
                    "<%= dist %>/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js",
                    "<%= bower_components %>/angular/angular.min.js",
                    "<%= dist %>/plugins/boostrapv3/js/bootstrap.min.js",
                    "<%= bower_components %>/angular-smart-table/Smart-Table.debug.js",
                    "<%= bower_components %>/datatables/media/js/jquery.dataTables.js",
                    "<%= bower_components %>/datatables-tabletools/js/dataTables.tableTools.js",
                    "<%= bower_components %>/angular-datatables/dist/angular-datatables.js",
                    "<%= dist %>/plugins/breakpoints.js",
                    "<%= dist %>/plugins/jquery-unveil/jquery.unveil.min.js",
                    "<%= dist %>/plugins/pace/pace.min.js",
                    "<%= dist %>/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                    "<%= dist %>/plugins/jquery-numberAnimate/jquery.animateNumbers.js",
                    "<%= dist %>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js",
                    "<%= dist %>/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
                    "<%= dist %>/plugins/jquery-block-ui/jqueryblockui.js",
                    "<%= dist %>/plugins/bootstrap-select2/select2.min.js",
                    "<%= dist %>/plugins/jquery-morris-chart/js/morris.min.js",
                    "<%= dist %>/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js",
                    "<%= dist %>/plugins/jquery-slider/jquery.sidr.min.js",
                    "<%= dist %>/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js",
                    "<%= dist %>/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js",
                    "<%= dist %>/plugins/jquery-sparkline/jquery-sparkline.js",
                    "<%= dist %>/plugins/jquery-flot/jquery.flot.min.js",
                    "<%= dist %>/plugins/jquery-flot/jquery.flot.animator.min.js",
                    "<%= dist %>/plugins/skycons/skycons.js"
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