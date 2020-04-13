const path = require('path');
const cleanWebpackPlugin = require('clean-webpack-plugin');
const htmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry:{
        app: path.join(__dirname, './source/App.js')
    },

    module:{
        rules:[
            {
                test: /\.css$/,
                use:[
                    'style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.(jpg|png|gif|svg)$/,
                use:[
                    'file-loader'
                ]
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                use:[
                    'file-loader'
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use:[
                    {
                        loader: 'babel-loader',
                        options:{
                            presets: ['@babel/preset-env'],
                            plugins: ['@babel/plugin-proposal-class-properties', '@babel/plugin-transform-runtime']
                        }
                    }
                ]
            }
        ]
    },

    plugins:[
        new cleanWebpackPlugin([path.join(__dirname, './build')]),
        new htmlWebpackPlugin({
            filename: 'index.html',
            template: path.join(__dirname, './source/index.html'),
            title: 'App'
        })
    ],

    output:{
        filename: '[name].bundle.js',
        path: path.join(__dirname, './build'),
        publicPath: '/'
    }
};