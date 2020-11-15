const { src } = require('gulp'),
    { path } = require("./files"),
    dest = require('gulp-multi-dest'),
    browsersync = require("browser-sync"),
    fileinclude = require('gulp-file-include'),
    pretty_html = require('gulp-pretty-html');

function html() {
    return src(path.src.html)
        .pipe(fileinclude())
        .pipe(pretty_html())
        .pipe(dest(path.build.html))
        .pipe(browsersync.stream());
}

module.exports = { html };