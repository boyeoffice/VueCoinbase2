const webpack = require('webpack');
let mix = require('laravel-mix');

var path = require('path');
mix.setPublicPath('public');
mix.options({ processCssUrls: false });

mix.js('resources/assets/js/app.js', 'public/js')
   //.sass('resources/assets/sass/app.scss', 'public/css')
   //.sass('resources/assets/sass/auth.scss', 'public/css')
   .sass('resources/assets/sass/adcom/app.scss', 'public/adcom/css').version()
   .copyDirectory('node_modules/font-awesome/fonts', 'public/adcom/fonts/font-awesome')
   .js('resources/assets/js/main.js', 'public/adcom/js')
   //admin styles and javascript
   .copyDirectory('node_modules/font-awesome/fonts', 'public/dist/fonts/font-awesome')
   .sass('resources/assets/sass/admin/main.scss', 'public/dist/css').version()
   .js('resources/assets/boyeCMS/core/js/boyecms.js', 'public/dist/js')
   .js([
      'resources/assets/js/vendor/main.js',
      'resources/assets/js/vendor/select2.js'
      ], 'public/dist/js/vendor.js').version();


   mix.webpackConfig({
       plugins: [
           new webpack.ProvidePlugin({
               introJs: ['intro.js', 'introJs']
           })
       ],
       resolve: {
           alias: {
               '@': path.resolve(__dirname, 'resources/assets/boyeCMS/core/js/config'),
               '_': path.resolve(__dirname, 'resources/assets/boyeCMS/core/js'),
               '~': path.resolve(__dirname, 'resources/assets/boyeCMS/dependencies/js')
           }
       },
       module: {
           loaders: [
               {
                   test: /\.json$/,
                   exclude: /node_modules/,
                   loader: 'json-loader'
               }
           ],
           rules: [
               {
                   test: /\.md$/,
                   use: 'raw-loader',
               }
           ]
       },
   });
