const webpack = require('webpack');
const CompressionPlugin = require("compression-webpack-plugin");

module.exports = function() {
    return {
        plugins: [
            new CompressionPlugin({
                test: /\.js$|\.css$/,
                threshold: 10240,
                minRatio: 0
            }),
        ]
    };
};

