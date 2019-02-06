const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/modal.js', 'public/js')
   .js('resources/js/ratingAjax.js', 'public/js')
   .js('resources/js/toggleFavoriteAjax.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/media-queries.scss', 'public/css');

mix.browserSync('andens.loc');