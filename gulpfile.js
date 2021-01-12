const gulp = require('gulp');
const sass = require('gulp-sass');
const merge = require("merge-stream");
const cleanCSS = require("gulp-clean-css");
const autoprefixer = require("gulp-autoprefixer");
const header = require("gulp-header");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");


// Load package.json for banner
const pkg = require('./package.json');

// Set the banner content
//const banner = ['/*!\n',
//    ' * Start Bootstrap - <%= pkg.title %> v<%= pkg.version %> (<%= pkg.homepage %>)\n',
//    ' * Copyright 2013-' + (new Date()).getFullYear(), ' <%= pkg.author %>\n',
//    ' * Licensed under <%= pkg.license %> (https://github.com/BlackrockDigital/<%= pkg.name %>/blob/master/LICENSE)\n',
//    ' */\n',
//    '\n'
//].join('');


 function modules() {
    // Bootstrap JS
    //var bootstrapJS = gulp.src('node_modules/bootstrap/dist/js/*')
        //.pipe(gulp.dest('app/assets/scripts/bootstrap/js'));
    // Bootstrap SCSS
    //var bootstrapSCSS = gulp.src('node_modules/bootstrap/scss/**/*')
        //.pipe(gulp.dest('assets/styles/bootstrap/scss'))
    //jQuerry    
    var jquery = gulp.src([
        'node_modules/jquery/dist/*',
        '!node_modules/jquery/dist/core.js'
        ])
        .pipe(gulp.dest('public/assets/scripts/jquery/js'))
    //return merge(bootstrapJS, bootstrapSCSS, jquery);
    return merge(jquery);
} 


//function css() {
    //return gulp
    //    .src([
    //        "node_modules/bootstrap/scss/**/*.scss",
    //    ])
    //    .pipe(plumber())
    //    .pipe(sass({
    //        outputStyle: "expanded",
    //        includePaths: "./node_modules",
    //    }))
    //    .on("error", sass.logError)
    //    .pipe(autoprefixer({
    //        cascade: false
    //    }))
    //    .pipe(header(banner, {
    //        pkg: pkg
    //    }))
    //    .pipe(gulp.dest("assets/styles/css/bootstrap"))
    //    .pipe(rename({
    //        suffix: ".min"
    //    }))
    //    .pipe(cleanCSS())
    //    .pipe(gulp.dest("assets/styles/css/bootstrap"))
//}

function maincss() {
    return gulp
        .src([
            "public/assets/styles/build/sass/*.scss",
        ])
        .pipe(plumber())
        .pipe(sass({
            outputStyle: "expanded",
            includePaths: "./node_modules",
        }))
        .on("error", sass.logError)
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(gulp.dest("public/assets/styles/css"))
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(cleanCSS())
        .pipe(gulp.dest("public/assets/styles/css"))
}

 function js() {
    return gulp
        .src([
            'public/assets/scripts/build/*.js',
            '!public/assets/scripts/build/*.min.js',
        ])
        .pipe(gulp.dest("public/assets/scripts/js"))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('public/assets/scripts/js'))
}

// Watch files
function watchFiles() {
    //gulp.watch("node_modules/bootstrap/scss/**/*", css);
    gulp.watch("public/assets/styles/build/sass/*", maincss);
    gulp.watch("public/assets/scripts/build/*.js", js);
    //gulp.watch(["./js/**/*", "!./js/**/*.min.js"], js);
}

const vendor = gulp.series(gulp.parallel(modules));
const build = gulp.series(vendor, gulp.parallel(maincss, js)); //const build = gulp.series(vendor, gulp.parallel(css, maincss, js));
const watch = gulp.series(build, gulp.parallel(watchFiles));

//exports.css = css;
exports.maincss = maincss;
exports.js = js;
//exports.clean = clean;
exports.vendor = vendor;
exports.build = build;
exports.watch = watch;
exports.default = build;