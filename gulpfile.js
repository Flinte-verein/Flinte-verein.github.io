var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');

// Compiles sass into css and autoinjects to browsers
gulp.task('sass', function () {
    return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'source/scss/*.scss'])
        .pipe(sass())
        .pipe(gulp.dest("source/css"))
        .pipe(browserSync.stream());
});

//moves js files to the source js folder

gulp.task('js', function () {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest("source/js"))
        .pipe(browserSync.stream());
});

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function () {

    browserSync.init({
        server: "./source"
    });

    gulp.watch('node_modules/bootstrap/scss/bootstrap.scss', 'source/scss/*.scss', ['sass']);
    gulp.watch("soucre/*.html").on('change', browserSync.reload);
});

gulp.task('default', ['js', 'serve']);