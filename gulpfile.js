var gulp    = require('gulp');
var sass    = require('gulp-sass');
var csso    = require('gulp-csso');

gulp.task('sass:compile', function(){
    return gulp.src('./resources/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./resources/css'));
});

gulp.task('css:minify', () => {
    return gulp.src('./resources/css/*.css')
        .pipe(csso())
        .pipe(gulp.dest('./resources/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./resources/scss/*.scss', ['sass:compile']);
});

