var gulp = require('gulp'),
  minifyCSS = require('gulp-minify-css'),
  sass = require('gulp-sass'),
  jshint = require('gulp-jshint');

gulp.task('sass', function () {
  return gulp.src('sass/**/*.scss')
    .pipe(sass())
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'));
});

gulp.task('jshint', function() {
  return gulp.src(['js/coderesponsible.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);