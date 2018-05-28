module.exports = function () {
    return {
        module: {
            rules: [
                {
                    test: /\.js$/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: [['env', {
                                "targets": {
                                    "browsers": ["last 4 versions", "ie >= 10"]
                                }
                            }]]
                        }
                    },
                    exclude: [/node_modules/, /vendors/]
                }
            ],
        },
    };
};