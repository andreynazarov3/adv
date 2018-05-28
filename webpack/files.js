module.exports = function () {
    return {
        module: {
            rules: [
                {
                    test: /\.(jpeg|jpg|png|ico|gif|svg)$/i,
                    loader: 'file-loader',
                    options: {
                        name: 'images/[name].[ext]'
                    },
                },
                {
                    test: /\.json$/i,
                    loader: 'file-loader',
                    options: {
                        name: 'js/json/[name].[ext]'
                    }
                },
                {
                    test: /\.(ttf|otf|eot|woff|woff2)$/i,
                    loader: 'file-loader',
                    options: {
                        name: 'fonts/[name].[ext]',
                        publicPath: './',
                    }
                }
            ],
        },
    };
};