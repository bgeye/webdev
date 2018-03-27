'use strict';

const gulp = require('gulp');

const autoprefixer = require('gulp-autoprefixer'); //browser prefixes
const browserSync = require('browser-sync');       //browser sync
const cssnano = require('gulp-cssnano');           //minimize css
const del = require('del');                        //delete defined source
const gulpIf = require('gulp-if');                 //define conditions
const jshint = require('gulp-jshint');             //code quality also lint
const runSequence = require('run-sequence');       //define sequence for tasks
const sass = require('gulp-sass');                 //scss -> css
const uglify = require('gulp-uglify');             //minimize js
const useref = require('gulp-useref');             //concatenation





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

gulp.task('useref-minify',function() {
    return gulp.src('app/*.html')      //select html files(build js/css currently)
        .pipe(useref())                //load code from html file and find syntax to concatenate <!--build--> one file of several in source
        .pipe(gulpIf('*.js',uglify())) //minimize js files
        .pipe(gulpIf('*.css',cssnano())) //minimize css files
        .pipe(gulp.dest('dist'));      //save in dist folder (built final-app to upload by ftp)
});


//watch task -> browserSync and sass in same time!
gulp.task('watch',['browserSync','sass'],function() {   //executed tasks after call of watch
   gulp.watch('app/scss/**/*.scss',['sass']);           //executed task after change in scss file
   gulp.watch('app/*.html',browserSync.reload);
   gulp.watch('app/js/**/*.js',browserSync.reload);

});


//task to define what to delete
gulp.task('clean:dist',function() {
    return del.sync('dist');
});

//copy task(copy folder image with png and or jpg files to dist)
gulp.task('copy:img',function() {
   return gulp.src('app/images/**/*.{png,jpg}')
       .pipe(gulp.dest('dist/images'));
});



//PRALLEL task to define e.g. all clean task(syntac clean:dist, clean:other,...)
gulp.task('clean',['clean:dist']);


//SEQUENCE task to define tasks which have to run each after the other

gulp.task('build',function(callback) {
    runSequence('clean','sass','useref-minify',['copy:img'],callback);
});


