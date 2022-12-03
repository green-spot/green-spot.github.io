const path = require("path");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin"); // styles.cssをminifyするやつ
const CopyWebpackPlugin = require("copy-webpack-plugin");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");
const { merge } = require("webpack-merge"); // webpackでdevとprodファイルをmergeするためのやつ
const common = require("./webpack.common.js"); // 共通設定をインポート

module.exports = merge(common, {
  mode: "production",
  optimization: {
    minimizer: [new CssMinimizerPlugin()],
  },
  // エントリーポイントの設定
  plugins: [
    new CopyWebpackPlugin({
      patterns: [
        {
          from: path.resolve(__dirname, "../assets/images"),
          to: path.resolve(__dirname, "../assets/images"),
        },
      ],
    }),

    // webp画像の設定 qualityの数値を変更する
    new ImageMinimizerPlugin({
      test: /\.(png|jpe?g)$/i,
      minimizer: {
        filename: "[path][name][ext].webp",
        implementation: ImageMinimizerPlugin.squooshMinify,
        options: {
          encodeOptions: {
            webp: {
              lossless: 1,
            },
          },
        },
      },
    }),

    // webpではない画像の圧縮設定 qualityの数値を変更する
    /*
    new ImageMinimizerPlugin({
      test: /\.(png|jpe?g)$/i,
      minimizer: {
        implementation: ImageMinimizerPlugin.squooshMinify,
        options: {
          encodeOptions: {
            mozjpeg: {
              quality: 100,
            },
          },
        },
      },
    }),
    */
  ],
  //source-map タイプのソースマップを出力
  devtool: false,
});
