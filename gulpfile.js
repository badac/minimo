'use strict'

var gulp = require('gulp');
var sass = require('gulp-dart-sass');

gulp.task('sass', function () {
  return gulp.src('./css/sass/*.scss')
    .pipe(sass({
      includePaths: [
        './node_modules/bootstrap/scss',
        './node_modules/simple-line-icons/scss/'
    ]
    }).on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});

gulp.task('sass:watch', function () {
  gulp.watch('./css/sass/**/*.scss'), gulp.series('sass');
});

gulp.task('default', gulp.series('sass:watch'));