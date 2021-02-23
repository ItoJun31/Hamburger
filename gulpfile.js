var gulp = require('gulp');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob'); //①「gulp-sassglob」を読み込み
var notify = require('gulp-notify'); //①「gulp-notify」を読み込み
var plumber = require('gulp-plumber'); //①「gulpplumber」を読み込み


gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
    .pipe(plumber()) //②「gulp.src」の直下に指定
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")})) //②plumberの引数にエラーメッセージを設定
    .pipe(sassGlob()) //②「sass」の前に指定
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(gulp.dest('./css'));
});

gulp.task('sass:watch', function() {
  gulp.watch('./sass/**/*.scss', gulp.task('sass'));
});

// 初版・2刷の方へ
// gulp v4 から上記の書き方に変更されています
// 本書P.51に乗っている gulp v3 の書き方
// gulp.task('sass:watch', function() {
//   gulp.watch('./sass/**/*.scss', ['sass']);
// });
