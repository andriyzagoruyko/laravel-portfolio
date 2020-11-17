const { parallel, series, watch } = require('gulp'),
      { css, cssProduction } = require('./gulp/css'),
      { js, jsProduction } = require('./gulp/js'),
      { assets, assetsProduction } = require('./gulp/assets'),
      { clean, path } = require("./gulp/files"),
      { html } = require('./gulp/html'),
      browsersync = require("browser-sync");

function watchFiles() {
  browsersync.init({
		server: "./dist/",
		port: 4000,
		notify: true,
		cors: true
  });

  watch([path.watch.html], html);
  watch([path.watch.css], css);
  watch([path.watch.js], js);
  watch([path.watch.assets], assets);
}

const build = series(clean, parallel(html, css, js, assets));

exports.default = parallel(build, watchFiles);
exports.production = series(clean, parallel(html, cssProduction, jsProduction, assetsProduction));