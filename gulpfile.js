var gulp      = require('gulp'),
  minifyCSS   = require('gulp-minify-css'),
  sass        = require('gulp-sass'),
  browserify  = require('gulp-browserify'),
  uglify      = require('gulp-uglify'),
  rename      = require('gulp-rename'),
  replace     = require('gulp-replace'),
  jshint      = require('gulp-jshint'),
  path        = require('path');

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

gulp.task('scripts', function() {
  gulp.src('js/*.js')
    .pipe(browserify({
      insertGlobals : true,
      transform: ['babelify'],
      debug : !gulp.env.production
    }))
    .pipe(uglify())
    .pipe(rename({
       extname: '.min.js'
     }))
    .pipe(replace('./build/js/*.min.js'))
    .pipe(gulp.dest('./build/js'));
});

gulp.task('watch', function() {
  gulp.watch('js/**/*.js', ['scripts']);
  gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['watch']);