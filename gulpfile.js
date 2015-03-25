var gulp = require('gulp'),
  minifyCSS = require('gulp-minify-css'),
  sass = require('gulp-sass');

gulp.task('sass', function () {
  return gulp.src('sass/**/*.scss')
    .pipe(sass())
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'));

});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);