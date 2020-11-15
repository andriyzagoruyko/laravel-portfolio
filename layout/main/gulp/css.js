const { src } = require('gulp'),
    { path } = require("./files"),
    dest = require('gulp-multi-dest'),
    browsersync = require("browser-sync"),
    sass = require('gulp-sass'),
    group_media = require('gulp-group-css-media-queries'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    clean_css = require('gulp-clean-css');

function css() {
    return src(path.src.css)
        .pipe(sass({
            outputStyle: "expanded",
            includePaths: ['node_modules']
        }))
        .pipe(group_media())
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 5 versions"],
                cascade: true
            })
        )
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream());
}

function cssProduction() {
    return src(path.src.css)
        .pipe(sass({
            outputStyle: "expanded",
            includePaths: ['node_modules']
        }))
        .pipe(group_media())
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 5 versions"],
                cascade: true
            })
        )
        .pipe(dest(path.build.css))
        .pipe(clean_css())
        .pipe(
            rename({
                extname: ".min.css"
            })
        )
        .pipe(dest(path.build.css))
}

module.exports = { css, cssProduction };