const gulp = require('gulp');

const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync');
const jshint = require('gulp-jshint');
const sass = require('gulp-sass');
const useref = require('gulp-useref');
//TODO: continue with uglify ppt 68



gulp.task('hello',function() {
   console.log('hoi du');
});

gulp.task('sass',function() {
   return gulp.src('app/scss/**/*.scss')
       .pipe(sass()) //convert Sass to CSS with gulp-sass
       .pipe(autoprefixer({
           browsers:['last 2 versions'],
           cascade:false
       }))

       .pipe(gulp.dest('app/css'))
       .pipe(browserSync.reload({
           stream: true
       }));
});

gulp.task('browserSync',function() {
   browserSync.init({
       server: {
           baseDir: 'app'
       },
   });
});

gulp.task('lint',function() {
  return gulp.src('app/js/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

gulp.task('build',function() {
    return gulp.src('app/*.html') //select html files(build js/css currently)
        .pipe(useref())           //load code in html file and find syntax to build <!--build-->
        .pipe(gulp.dest('dist')); //save in dist folder (built final-app to upload by ftp)
});

gulp.task('watch',['browserSync','sass'],function() {
   gulp.watch('app/scss/**/*.scss',['sass']);
   gulp.watch('app/*.html',browserSync.reload);
   gulp.watch('app/js/**/*.js',browserSync.reload);

});
