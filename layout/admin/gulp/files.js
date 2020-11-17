const del = require('del');

const source_folder = "#src",
    dist_folder = ["dist", "../../portfolio/public"];

path = {
    src: {
        html: [source_folder + "/*.html", "!" + source_folder + "/_*.html"],
        css: source_folder + "/scss/style.scss",
        js: source_folder + "/js/script.js",
        assets: source_folder + "/assets/**/*.*",
        img: source_folder + "/assets/img/**/*.+(png|jpg|gif|ico|svg|webp)",
    },
    watch: {
        html: source_folder + "/**/*.html",
        css: source_folder + "/scss/**/*.scss",
        js: source_folder + "/js/**/*.js",
        assets: source_folder + "/assets/**/*.*",
        img: source_folder + "/assets/img/**/*.+(png|jpg|gif|ico|svg|webp)",
    },
    build: { html: [], css: [], js: [], assets: [], img: [] }
}

dist_folder.forEach((dist, i) => {
    path.build.html[i] = dist + "/";
    path.build.css[i] = dist + "/assets/admin/css/";
    path.build.js[i] = dist + "/assets/admin/js/";
    path.build.assets[i] = dist + "/assets/admin/";
    path.build.img[i] = dist + "/assets/admin/img/";
});

function clean(cb) {
    del.sync(dist_folder[0]);

    cb();
}

module.exports = { clean, path };