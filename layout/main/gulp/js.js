const { src } = require('gulp'),
    { path } = require("./files"),
    dest = require('gulp-multi-dest'),
    browsersync = require("browser-sync"),
    webpack = require("webpack-stream");

function js() {
    return src(path.src.js)
        .pipe(webpack({
            mode: 'development',
            output: {
                filename: 'script.js'
            },
            watch: false,
            devtool: "source-map",
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules|bower_components)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: [
                                    ['@babel/preset-env', {
                                        debug: true,
                                        corejs: 3,
                                        useBuiltIns: "usage",
                                        targets: "> 1%, not dead"
                                    }],
                                ],
                                plugins:[
                                    ["@babel/plugin-proposal-class-properties"]
                                ] 
                            }
                        }
                    }
                ]
            }
        }))
        .pipe(dest(path.build.js))
        .pipe(browsersync.stream());
}

function jsProduction() {
    return src(path.src.js)
        .pipe(webpack({
            mode: 'production',
            output: {
                filename: 'script.min.js'
            },
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules|bower_components)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: [
                                    ['@babel/preset-env', {
                                        corejs: 3,
                                        useBuiltIns: "usage",
                                        targets: "> 1%, not dead"
                                    }],
                                ],
                                plugins:[
                                    ["@babel/plugin-proposal-class-properties"]
                                ] 
                            }
                        }
                    }
                ]
            }
        }))
        .pipe(dest(path.build.js));
}

module.exports = { js, jsProduction };