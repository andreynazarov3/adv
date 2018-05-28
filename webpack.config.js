'use strict';

const path = require('path');
const merge = require('webpack-merge');
const devserver = require('./webpack/devserver');
const sass = require('./webpack/sass');
const babel = require('./webpack/babel');
const extractCSS = require('./webpack/css.extract');
const files = require('./webpack/files');
const jsProd = require('./webpack/js.prod');
const progressBar = require('progress-bar-webpack-plugin');
const babelMinify = require('babel-minify-webpack-plugin');
const PATHS = {
    source: path.join(__dirname, 'sources'),
    build: __dirname
};

const common = merge([
    {
        entry: {
            'index': PATHS.source + '/index.js',
        },
        output: {
            path: PATHS.build,
            filename: 'js/[name].js'
        },
        devtool: '#cheap-module-source-map',
        plugins: [
            new progressBar(),
            new babelMinify()
        ]
    },
    babel(),
    files()
]);

module.exports = function (env) {
    if (env === 'production') {
        return merge([
            common,
            extractCSS(),
            jsProd()
        ]);
    }
    if (env === 'development') {
        return merge([
            common,
            devserver(),
            sass()
        ]);
    }
};