// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');
var cleanCSS = require('gulp-clean-css');
// var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var sassGlob = require('gulp-sass-glob');

// Paths for SASS imports
var sassIncludePaths = [
    './assets/src/node_modules/foundation-sites/scss/',
    './assets/src/node_modules/bourbon/app/assets/stylesheets/',
    './assets/src/fontawesome-css/scss/',
    './assets/src/node_modules/hamburgers/_sass/hamburgers/',
    './assets/src/node_modules/normalize.css/',
];

// Paths for task files
var paths = {
    scss: 'assets/src/scss/**/*.scss',
    js: {
        lint: [
            'assets/src/js/**/*.js'
        ],
        concat: [
            'assets/src/node_modules/jquery/dist/jquery.min.js',
            'assets/src/node_modules/foundation-sites/dist/js/foundation.js',
            'assets/src/node_modules/slick-carousel/slick/slick.min.js',
            // add new plugins here
            'assets/src/js/**/*.js'
        ]
    },
    sync: [
        'assets/css/**/*.css',
        'assets/js/all.js',
        '**/*.php'
    ]
}

var handleError = function(err) {
    notify.onError({
        title:    "Gulp",
        subtitle: "Failure!",
        message:  "Error: <%= error.message %>",
        sound:    "Beep"
    })(err);
    this.emit('end');
}

// Lint Task
gulp.task('lint', function() {
    return gulp.src(paths.js.lint)
        .pipe(plumber({errorHandler: handleError}))
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('css', function() {
    return gulp.src(paths.scss)
        .pipe(plumber({errorHandler: handleError}))
        // .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(sass({
            includePaths: sassIncludePaths
        }))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/css'))
        .pipe(notify('CSS Saved'))
        .pipe(rename(function (path) {
            path.basename += ".min";
        }))
        .pipe(cleanCSS({compatibility: 'ie9'}))
        .pipe(gulp.dest('assets/css'))
        .pipe(notify('CSS Minified'));
});

// Concatenate & Minify JS
gulp.task('js', function() {
    return gulp.src(paths.js.concat)
        .pipe(plumber({errorHandler: handleError}))
        // .pipe(sourcemaps.init())
        .pipe(concat('all.js'))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/js'))
        .pipe(notify('JS Saved'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'))
        .pipe(notify('JS Minified'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch(paths.js.lint, ['lint', 'js']);
    gulp.watch(paths.scss, ['css']);
});

// Default Task
gulp.task('default', ['lint', 'css', 'js', 'watch']);
