const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    mode: 'production',
    entry: {
        main: ['./src/js/main.js', './src/css/main.scss'],
        // login: ['./src/css/login-form.scss'],
    },
    output: {
        filename: 'js/[name].js',
        path: path.resolve(__dirname, '../resources/')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: '../resources/css/',
                            hmr: process.env.NODE_ENV === 'development',
                        }
                    },
                    'css-loader',
                    'sass-loader'
                ],
            },
        ]
    },
    plugins: [
        new UglifyJSPlugin(),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
            path: path.resolve(__dirname, '../resources/')
        }),
        new CopyPlugin([
            {from: './src/img', to: '../resources/img'}
        ])
    ],
    watchOptions:  {
        ignored: /node_modules/,
    },
    externals: {
        jquery: 'jQuery'
    }
}