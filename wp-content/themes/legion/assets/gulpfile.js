/* options */
var $options = {
        'url': 'yourwebsite.somewhere.dev',
        'sass': {
            'main': {
                'input': ['scss/style.scss'],
                'watch': ['scss/style.scss', 'scss/_components/**/*.scss'],
                'output': {
                    'directory': 'css',
                    'filename': 'style.css',
                }
            }
        },
        'javascript': {
            'main': {
                'input': [
                    'js/main/**/*.js'],
                'output': {
                    'directory': 'js/min',
                    'filename': 'main.min.js',
                }
            },
            'vendor': {
                'input': [
        
            ],
                'output': {
                    'directory': 'js/min',
                    'filename': 'plugins.min.js',
                }
            },
            'moderniser': {
                'input': ['bower_components/modernizr/modernizr.js'],
                'output': {
                    'directory': 'js/min',
                    'filename': 'modernizr.min.js',
                }
            },
        },
        'sassOptions': {
            /*'errLogToConsole': true,*/
            'outputStyle': 'compressed'
        },
        'autoprefixerOptions': {
            'browsers': ['last 2 versions', '> 5%', 'Firefox ESR']
        }
      };

        /* packages */
        var gulp = require('gulp'),
            jshint = require('gulp-jshint'),
            stylish = require('jshint-stylish'),
            sass = require('gulp-sass'),
            merge = require('merge-stream'),
            concat = require('gulp-concat'),
            uglify = require('gulp-uglify'),
            rename = require('gulp-rename'),
            sourcemaps = require('gulp-sourcemaps'),
            plumber = require('gulp-plumber'),
            changed = require('gulp-changed'),
            newer = require('gulp-newer'),
            debug = require('gulp-debug'),
            autoprefixer = require('gulp-autoprefixer'),
            cssnano = require('gulp-cssnano'),
            notify = require("gulp-notify"),
            browserSync = require('browser-sync').create(),
            reload = browserSync.reload;

        $options.errors = {

            'errorHandler': function (error) {

                var lineNumber = (error.lineNumber) ? error.lineNumber : '';
                var fileName = (error.fileName) ? error.fileName : '';

                var message = error.message;
                if (fileName != "") {
                    message += ' ' + fileName + ' @' + lineNumber;
                }

                notify({
                    title: 'Task Failed [' + error.plugin + ']',
                    message: message,
                }).write(error);

                this.emit('end');
            }
        }

        gulp.task('browser-sync-init', function () {
            browserSync.init({
                proxy: $options.url
            });
        });

        /* Compilers */

        var $compilers = {};
        $compilers.javascript = function ($files) {

            return gulp.src($files.input)
                .pipe(plumber($options.errors))
                .pipe(debug())
                .pipe(sourcemaps.init())
                .pipe(concat($files.output.filename))
                .pipe(uglify())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest($files.output.directory))
                .pipe(reload({
                    stream: true
                }));

        }

        $compilers.sass = function ($files) {

            return gulp.src($files.input)
                .pipe(plumber($options.errors))
                .pipe(sourcemaps.init())
                .pipe(sass($options.sassOptions))
                .pipe(autoprefixer($options.autoprefixerOptions))
                .pipe(cssnano())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest($files.output.directory))
                .pipe(reload({
                    stream: true
                }));
        }

        /* Tasks */
        gulp.task('scripts_main', function () {
            return $compilers.javascript($options.javascript.main);
        });
        gulp.task('scripts_vendor', function () {
            return $compilers.javascript($options.javascript.vendor);
        });
        gulp.task('scripts_moderniser', function () {
            return $compilers.javascript($options.javascript.moderniser);
        });

        gulp.task('sass_main', function () {
            return $compilers.sass($options.sass.main)
        });

        // Lint Task
        gulp.task('lint', function () {
            return gulp.src($options.javascript.main.input)
                .pipe(debug())
                .pipe(plumber($options.errors))
                .pipe(jshint())
                .pipe(jshint.reporter(stylish));
        });

        /*
         * Production
         */
        gulp.task('sass__production', function () {
            return gulp.src($options.sass.main)
                .pipe(changed('css'))
                .pipe(plumber($options.errors))
                .pipe(sass($options.sassOptions))
                .pipe(autoprefixer($options.autoprefixerOptions))
                .pipe(cssnano())
                .pipe(gulp.dest($options.output.css));
        });

        gulp.task('scripts__production', function () {
            return gulp.src($options.javascript.main)
                .pipe(plumber($options.errors))
                .pipe(concat('main.min.js'))
                .pipe(uglify())
                .pipe(gulp.dest($options.output.javascript));
        });

        // Watch Files For Changes
        gulp.task('watch', function () {
            gulp.watch($options.javascript.main.input, ['scripts_main']);
            gulp.watch($options.sass.main.watch, ['sass_main']);
        });

        // Task Groups (Development)
        gulp.task('default', ['sass_main', 'scripts_main', 'watch', 'browser-sync-init']);

        gulp.task('vendor', ['scripts_vendor', 'scripts_moderniser']);

        //Production
        gulp.task('production', ['scripts__production', 'sass__production', 'moderniser']);
