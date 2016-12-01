'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

var sassSource = './sass/*.scss';
var cssOutput = './src/css';

gulp.task('sass', function () {
    return gulp.src(sassSource)
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest(cssOutput));
});

gulp.task('sass:watch', function () {
    gulp.watch(sassSource, ['sass']);
});

gulp.task('js', function () {
    return gulp.src('./bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js')
        .pipe(gulp.dest('./src/js/'));
});