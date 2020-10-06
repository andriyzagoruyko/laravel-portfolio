let folder_prefix = "admin";
let project_folder = "dist/assets/" + folder_prefix;
let source_folder = "#src";

let path = {
    build: {
        html: project_folder+"/",
        css: project_folder+"/css/",
        js: project_folder+"/js/",
        img: project_folder+"/img/",
        fonts: project_folder+"/fonts/",
    },
    laravel: {
        css: "../../portfolio/public/assets/" + folder_prefix + "/css",
        js: "../../portfolio/public/assets/"+ folder_prefix + "/js",
        fonts: "../../portfolio/public/assets/"+ folder_prefix + "/fonts",
        img: "../../portfolio/public/assets/"+ folder_prefix + "/img",
    },
    src: {
        html: [source_folder+"/*.html", "!"+source_folder+"/_*.html"],
        css: source_folder+"/scss/style.scss",
        js: source_folder+"/js/script.js",
        img: source_folder+"/img/**/*.+(png|jpg|gif|ico|svg|webp)",
        fonts: source_folder+"/fonts/**/*.+(woff|woff2|eot|svg|ttf|woff)",
    },
    watch: {
        html: source_folder+"/**/*.html",
        css: source_folder+"/scss/**/*.scss",
        js: source_folder+"/js/**/*.js",
        img: source_folder+"/img/**/*.+(png|jpg|gif|ico|svg|webp)",
    },
    clean: "./" + project_folder +"/"
}

let fs = require('fs');

let { src, dest } = require('gulp'),
    gulp = require('gulp'),
    browsersync = require('browser-sync').create(),
    fileinclude = require('gulp-file-include'),
    del = require('del'),
    scss = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    group_media = require('gulp-group-css-media-queries'),
    clean_css = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify-es').default,
    imagemin = require("gulp-imagemin"),
    webp = require("gulp-webp"),
    webphtml = require("gulp-webp-html")
    webpcss = require("gulp-webpcss"),
    svgSprite = require("gulp-svg-sprite")
    ttf2woff = require("gulp-ttf2woff"),
    ttf2woff2 = require("gulp-ttf2woff2"),
    fonter = require("gulp-fonter");

function browserSync(params){
    browsersync.init({
        server:{
            baseDir: "./" + project_folder +"/"
        },
        port:3000,
        notify:false
    })
} 

gulp.task('svgSprite', function(){
    return gulp.src([source_folder + '/iconsprite/*.svg'])
    .pipe(svgSprite({
            mode:{
                stack:{
                    sprite: "../icons/icons.svg",
                }
            }
        }
    ))
    .pipe(dest(path.build.img))
})

gulp.task('otf2ttf', function(){
    return gulp.src([source_folder + '/fonts/*.otf'])
        .pipe(fonter({
            formats:['ttf']
        }))
        .pipe(dest(source_folder + "/fonst/"))
})

function watchFiles(params){
    gulp.watch([path.watch.html], html);
    gulp.watch([path.watch.css], css);
    gulp.watch([path.watch.js], js);
    gulp.watch([path.watch.img], images);
}


function fonts(){
    return src(path.src.fonts)
        .pipe(dest(path.build.fonts))    
        .pipe(dest(path.laravel.fonts))
}

function clean(){
    return del(path.clean);
}

function css(params){
    return src(path.src.css)
        .pipe(
            scss({
                outputStyle: "expanded"
            })
        )
        .pipe(
            group_media()
        )
        .pipe(
            autoprefixer({
                overrideBrowserslist:["last 5 versions"],
                cascade: true
            })
        )
        /* .pipe(webpcss())
        .pipe(dest(path.build.css))    
        .pipe(clean_css())
        .pipe(
            rename({
                extname:".min.css"
            })
        )*/
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream())
        .pipe(dest(path.laravel.css))
}

function html(){
    return src(path.src.html)
        .pipe(fileinclude())
        //.pipe(webphtml())
        .pipe(dest(path.build.html))
        .pipe(browsersync.stream())
}

function js(){
    return src(path.src.js)
        .pipe(fileinclude())
        .pipe(dest(path.build.js))
        .pipe(dest(path.laravel.js))
        .pipe(
            rename({
                extname:".min.js"
            })
        )
        //.pipe(uglify())
        .pipe(dest(path.build.js))
        .pipe(browsersync.stream())
        .pipe(dest(path.laravel.js))
}

function images(){
    return src(path.src.img)
        /*.pipe(dest(path.build.img))
        .pipe(
            webp({
                quality: 90
            })
        )*/
        .pipe(dest(path.build.img))
        .pipe(src(path.src.img))
        .pipe(
            imagemin([
                imagemin.svgo({
                    plugins: [
                        { optimizationLevel: 3 },
                        { progessive: true },
                        { interlaced: true },
                        { removeViewBox: false },
                        { removeUselessStrokeAndFill: false },
                        { cleanupIDs: false }
                    ]
                }),
                imagemin.mozjpeg(),
                imagemin.gifsicle(),
                imagemin.optipng()
            ])
        )
        .pipe(dest(path.build.img))
        .pipe(dest(path.laravel.img))
        .pipe(browsersync.stream())
}

function fontsStyle(params) {
    let file_content = fs.readFileSync(source_folder + '/scss/fonts.scss');
    if (file_content == '') {
        fs.writeFile(source_folder + '/scss/fonts.scss', '', cb);
        return fs.readdir(path.build.fonts, function (err, items) {
        if (items) {
        let c_fontname;
        for (var i = 0; i < items.length; i++) {
            let fontname = items[i].split('.');
            fontname = fontname[0];
            if (c_fontname != fontname) {
                fs.appendFile(source_folder + '/scss/fonts.scss', '@include font("' + fontname + '", "' + fontname + '", "400", "normal");\r\n', cb);
            }
            c_fontname = fontname;
        }
        }
    })
    }
}

function cb(){
}

let build = gulp.series(clean,  gulp.parallel(js, css, html, images, fonts));
let watch = gulp.parallel(build, watchFiles, browserSync);

exports.fontsStyle = fontsStyle;
exports.fonts = fonts;
exports.images = images;
exports.js = js;
exports.css = css;
exports.html = html;
exports.build = build;
exports.watch = watch;
exports.default = watch;