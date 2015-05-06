var browserify = require('gulp-browserify');
var concat = require('gulp-concat');
var connect = require('gulp-connect');
var gulp = require('gulp');
var gulpif = require('gulp-if');
var gutil = require('gulp-util');
var minifycss = require('gulp-minify-css');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');

var fs = require('fs');
var config = require('./gulp-config.js');

var DEVMODE = true;

// clean
gulp.task('clean', function () {
    gulp.src([
        config.public_dir + '/css',
        config.public_dir + '/fonts',
        config.public_dir + '/js',
        config.public_dir + '/plugins'
    ])
        .pipe(clean());
});

// SASS
gulp.task('sass', function () {
    // main
    gulp.src(config.src_dir + '/scss/main.scss')
        .pipe(gulpif(DEVMODE, sourcemaps.init()))
        .pipe(sass({errLogToConsole: true}))
        //.on('error', swallowErrors)
        .pipe(gulpif(!DEVMODE, minifycss({
            keepSpecialComments: false
        })))
        .pipe(gulpif(DEVMODE, sourcemaps.write('./')))
        .pipe(rename(config.pkg_name+".css"))
        .pipe(gulp.dest(config.public_dir + '/css'));

    // plugins
    gulp.src(config.src_dir + '/scss/plugins.scss')
        .pipe(gulpif(DEVMODE, sourcemaps.init()))
        .pipe(sass({errLogToConsole: true}))
        //.on('error', swallowErrors)
        .pipe(gulpif(!DEVMODE, minifycss({
            keepSpecialComments: false,
        })))
        .pipe(gulpif(DEVMODE, sourcemaps.write('./')))
        .pipe(gulp.dest(config.public_dir + '/css'));
});


// Javascript with Browserify
gulp.task('js', function () {
    // shared
    fs.readdir(config.src_dir + '/js/shared/', function (err, files) {
        if (files) {
            for (var i = 0, len = files.length; i < len; i++) {
                gulp.src(config.src_dir + '/js/shared/' + files[i] + '/' + files[i] + '.js')
                    .pipe(browserify({
                        insertGlobals: true,
                        debug: DEVMODE
                    }))
                    .pipe(gulpif(!DEVMODE, uglify()))
                    .pipe(gulp.dest(config.public_dir + '/js/shared'));
            }
        }
    });


    // components
    fs.readdir(config.src_dir + '/js/components/', function (err, files) {
        if (files) {
            for (var i = 0, len = files.length; i < len; i++) {
                gulp.src(config.src_dir + '/js/components/' + files[i] + '/' + files[i] + '.js')
                    .pipe(browserify({
                        insertGlobals: true,
                        debug: DEVMODE
                    }))
                    .pipe(gulpif(!DEVMODE, uglify()))
                    .pipe(gulp.dest(config.public_dir + '/js/components'));
            }
        }
    });


    // plugins
    var files = [];

    for (var i = 0, len = config.plugin_files.js.length; i < len; i++) {
        files.push(config.plugin_files.js[i].replace('<%= pkg_dir %>', config.pkg_dir));
    }

    gulp.src(files)
        .pipe(concat('plugins.js'))
        .pipe(gulpif(!DEVMODE, uglify()))
        .pipe(gulp.dest(config.public_dir + '/js'));


    // config
    gulp.src(config.src_dir + '/js/config.js')
        .pipe(gulpif(!DEVMODE, uglify()))
        .pipe(rename('config.js'))
        .pipe(gulp.dest(config.public_dir + '/js'));
});


// Copy
gulp.task('copy', function () {
    var file = '';

    // fonts
    for (var i = 0, len = config.plugin_files.fonts.length; i < len; i++) {
        file = config.plugin_files.fonts[i].replace('<%= pkg_dir %>', config.pkg_dir);

        gulp.src(file)
            .pipe(gulp.dest(config.public_dir + '/fonts'));
    }

    // vendor
    for (var i = 0, len = config.plugin_files.vendor.length; i < len; i++) {
        file = config.plugin_files.vendor[i].replace('<%= pkg_dir %>', config.pkg_dir);

        gulp.src(file)
            .pipe(gulp.dest(config.public_dir + '/js/vendor'));
    }

    // packages
    for (var plugin in config.plugin_files.copy) {

        if (Object.prototype.toString.call(config.plugin_files.copy[plugin]) !== '[object Array]') {
            config.plugin_files.copy[plugin] = [config.plugin_files.copy[plugin]];
        }

        for (var i = 0, len = config.plugin_files.copy[plugin].length; i < len; i++) {

            file = config.plugin_files.copy[plugin][i].replace('<%= pkg_dir %>', config.pkg_dir).replace('<%= workbench_dir %>', config.workbench_dir);

            if (fs.lstatSync(file).isDirectory()) {
                gulp.src(file + '/**/*', {base: file})
                    .pipe(gulp.dest(config.public_dir + '/plugins/' + plugin));
            } else {
                gulp.src(file)
                    .pipe(gulp.dest(config.public_dir + '/plugins/' + plugin));
            }
        }
    }
});

gulp.task('concat-css', function () {
    return gulp.src([
        config.public_dir+'/css/arxmin.css',
        config.public_dir+'/css/plugins.css',
    ])
        .pipe(concat({ path: 'arxmin-combined.css', stat: { mode: 0666 }}))
        .pipe(gulp.dest(config.public_dir+'/css'));
});

gulp.task('concat-js', function () {
    /*return gulp.src([
        config.public_dir+'/js/arxmin.js',
        config.public_dir+'/js/plugins.js',
    ])
        .pipe(concat({ path: 'arxmin-combined.js', stat: { mode: 0666 }}))
        .pipe(gulp.dest(config.public_dir+'/js'));*/
});


gulp.task('dev', function () {
    DEVMODE = true;

    gulp.start('sass', 'js', 'copy', 'concat-css', 'concat-js');

    gulp.src('./').pipe(notify(' ʕ•ᴥ•ʔ <( Dev build complete! ) '));
    gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Dev build complete! ) '));
});


gulp.task('build', function () {
    DEVMODE = false;

    gulp.start('sass', 'js', 'copy', 'concat-css', 'concat-js');

    gulp.src('./').pipe(notify(' ʕ•ᴥ•ʔ <( Build complete! ) '));
    gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Build complete! ) '));
});


gulp.task('server', function () {
    connect.server({
        root: '.',
        livereload: true
    });
});

gulp.task('default', function () {
    gulp.start('build');
    gulp.start('watch');
});


gulp.task('watch', function () {
    DEVMODE = true;

    gulp.start('server');

    gulp.watch([
        config.src_dir + '/js/**/*.js',
        config.src_dir + '/js/**/**/*.js',
    ], ['js']);

    gulp.watch([
        config.src_dir + '/scss/**/*.scss',
        config.src_dir + '/scss/**/**/*.scss',
    ], ['sass']);

    gulp.watch([
        './gulpfile.js',
        './gulp-config.js',
    ], ['dev']);

    gulp.watch(config.livereload)
    .on('change', function (file) {
        gulp.src(file.path)
            .pipe(connect.reload())
            .pipe(notify({msg : ' ʕ•ᴥ•ʔ <( Reload! )', onLast : true}));
        //gutil.log(gutil.colors.inverse(' ʕ•ᴥ•ʔ <( Reload! ) '));
    });

    gutil.log(gutil.colors.inverse(' ( Ready to work! )> ᕙ(`▽´)ᕗ '));
});

// Debug

function swallowErrors(error) {
    var message = '';

    if (error && error.toString()) {
        message = error.toString();
    }

    gutil.log(gutil.colors.red('✖', message));

    gulp.src('./').pipe(notify('✖ Error'));

    this.emit('end');
}

// hide console notify text
notify.logLevel(0);