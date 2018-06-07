var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var imagemin = require('gulp-imagemin');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');

var plumberErrorHandler = {
  errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

gulp.task('sass', function () {
  gulp.src('./src/scss/*.scss')
  .pipe(plumber(plumberErrorHandler))
  .pipe(sourcemaps.init())
  .pipe(sass())
  .pipe(autoprefixer())
  .pipe(gulp.dest('./assets/css'))
  .pipe(cssnano())
  .pipe(concat('uswds.min.css'))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('./assets/css'));
  .pipe(browserSync.stream());
});

gulp.task('scripts', function () {
  gulp.src('./src/js/*.js')
	.pipe(plumber(plumberErrorHandler))
  .pipe(jshint())
  .pipe(sourcemaps.init())
  .pipe(gulp.dest('./assets/js'))
	.pipe(uglify())
  .pipe(concat('uswds.min.js'))
  .pipe(sourcemaps.write('.'))
	.pipe(gulp.dest('./assets/js'));
});

gulp.task('images', function () {
  gulp.src('./src/img/**/*')
  .pipe(imagemin())
  .pipe(gulp.dest('./assets/img'))
});

// Browser-sync
gulp.task('browser-sync', function() {
  var files = [
    '/assets/css/style.css',
    '/*.php'
  ];
  browserSync.init(files, {
    // Assumes local site is serving from site.local naming. Change sandbox to your site name.
    proxy: "the-standards.local"
  });
});

gulp.task('watch', function() {
  gulp.watch('src/scss/**/*.scss', ['sass']);
  gulp.watch('src/img/**/*', ['images']);
});

gulp.task('default', ['sass', 'scripts', 'images', 'browser-sync', 'watch']);
