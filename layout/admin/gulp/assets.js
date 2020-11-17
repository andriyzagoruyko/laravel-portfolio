const { src } = require('gulp'),
    { path } = require("./files"),
    dest = require('gulp-multi-dest'),
    browsersync = require("browser-sync"),
    imagemin = require("gulp-imagemin"),
    webp = require("gulp-webp");

function assets() {
    return src(path.src.assets)
        .pipe(dest(path.build.assets))
        .pipe(browsersync.stream());
}

function assetsProduction(cb) {
    src([path.src.assets, `!${path.src.img}`])
        .pipe(dest(path.build.assets))

    src(path.src.img)
        .pipe(dest(path.build.img))
        .pipe(
            webp({
                quality: 90
            })
        )
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
        .pipe(browsersync.stream())

    cb();
}

module.exports = { assets, assetsProduction };