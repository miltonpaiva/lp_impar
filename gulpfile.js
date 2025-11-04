'use strict';

const gulp         = require("gulp");
const sass         = require('gulp-sass')(require('sass'));
const webpack      = require('webpack-stream');
const autoprefixer = require('autoprefixer');
const html         = require("gulp-htmlmin");
const gulpif       = require('gulp-if');
const imagemin     = require("gulp-imagemin");
const concat       = require('gulp-concat');
const newer        = require("gulp-newer");
const notify       = require('gulp-notify'); 
const rename       = require('gulp-rename');
const postcss      = require("gulp-postcss");   
const plumber      = require("gulp-plumber");   
const cleanCSS     = require('gulp-clean-css');    
const spritesmith  = require('gulp.spritesmith');
const deleteAsync  = require('delete'); // ✅ substituto do del
const size         = require('gulp-size');
const tinypng      = require('gulp-tinypng-compress');
const browserSync  = require('browser-sync').create();
const PluginError  = require('plugin-error');

// sync
function sync() {
    browserSync.init({
        proxy: 'http://impar-tecnologia.local/',
        notify: true,
        port: 8000
    })
}

// clear
function clean(cb) {
    deleteAsync(["./assets/"], cb);
}

// sprites
function sprite() {
    return gulp.src("./_src/images/*.png").pipe(spritesmith({
        imgName: 'sprite.png',
        cssName: '_sprite.scss',
        imgPath: '../images/sprite.png',
        padding: 10
    }))  
    .pipe(gulpif('*.png', gulp.dest('./assets/images')))
    .pipe(gulpif('_sprite.scss', gulp.dest('./_src/scss')))
    .pipe(browserSync.stream())
}

// images
function images() {
    return gulp
    .src("./_src/images/**/*") 
    .pipe(tinypng({
        key: 'qB8lTb6tYVHxl5TJLRKsMqmjQ4JD8PDN',
        sigFile: 'images/.tinypng-sigs',
        log: true
    }))
    .pipe(newer("./assets/images"))
    .pipe(imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.mozjpeg({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
            plugins: [
                {
                    removeViewBox: false,
                    collapseGroups: true
                }
            ]
        })
    ]))
    .pipe(gulp.dest("./assets/images"))
    .pipe(size({
        title: '[ IMG  ] Tamanho do arquivo minificado ✔ :',
        gzip: false,  
        pretty: true,
        showFiles: true,
        showTotal: true
    }))   
    .pipe(browserSync.stream());
}

// fonts
function fonts() {
    return gulp
    .src('./_src/fonts/**/*')   
    .pipe(gulp.dest('./assets/fonts'))  
    .pipe(size({
        title: '[ FONT ] Tamanho do arquivo:',
        gzip: false,  
        pretty: true,
        showFiles: true,
        showTotal: true
    }))
    .pipe(browserSync.stream());
}

// scripts
function scripts() {
    return gulp
    .src([
        '!./_src/js/_excludes/**/*.js',
        './_src/js/_includes/**/*.js', 
        './_src/js/*.js'
    ])  
    .pipe(concat('main.min.js'))
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest('./assets/js'))
    .pipe(size({
        title: '[  JS  ] Tamanho do arquivo minificado ✔ :',
        gzip: false,  
        pretty: true,
        showFiles: true,
        showTotal: true
    }))  
    .pipe(browserSync.stream());
}

// css
function css() {
    const onError = function (err) {
        notify.onError({
            title: "Gulp",
            subtitle: "Failure!",
            message: "Error: <%= error.message %>",
            sound: "Beep",
        })(err);
        this.emit('end');
    };

    return gulp
        .src('./_src/scss/**/*.scss')
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sass({ outputStyle: "expanded" }).on('error', sass.logError))
        .pipe(concat('main.css'))
        .pipe(cleanCSS())
        .pipe(rename("main.min.css"))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(size({
            title: '[CSS] Tamanho do arquivo minificado:',
            gzip: false,
            pretty: true,
            showFiles: true,
            showTotal: true,
        }))
        .pipe(browserSync.stream());
}

// html
function dom() {
    return gulp
    .src('./templates/dev/**/*.php')
    .pipe(size({
        title: '[ HTML ] Tamanho do arquivo:',
        gzip: false,  
        pretty: true,
        showFiles: true,
        showTotal: true
    }))   
    .pipe(html({collapseWhitespace:true}))
    .on("error", notify.onError({ message: "Error: <%= error.message %>"}))
    .pipe(gulp.dest('./templates/'))
    .pipe(size({
        title: '[ HTML ] Tamanho do arquivo minificado ✔ :',
        gzip: false,  
        pretty: true,
        showFiles: true,
        showTotal: true
    }))  
    .pipe(browserSync.stream())
}

gulp.task("sass", css);
gulp.task("js", scripts);

function watch(){
    gulp.watch('./_src/scss/**/*', css);
    gulp.watch('./_src/images/*.png', sprite);
    gulp.watch('./_src/images/**/*', images);
    gulp.watch('./_src/fonts/**/*', fonts);
    gulp.watch('./_src/js/**/*', gulp.series(scripts));
}

gulp.task('build', gulp.series(clean, gulp.parallel(css, images, fonts, sprite, scripts)));
gulp.task('default', gulp.parallel(watch, sync));
