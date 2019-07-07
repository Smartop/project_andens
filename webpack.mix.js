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
   /*.js('resources/js/mainPage/ratingAjax.js', 'public/js')
   .js('resources/js/mainPage/toggleFavoriteAjax.js', 'public/js')
    .js('resources/js/mainPage/onScrollFromHeader.js', 'public/js')*/
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/media-queries.scss', 'public/css')
   .sass('resources/sass/profile_page.scss', 'public/css')
   .sass('resources/sass/photo_page.scss', 'public/css');
   
mix.combine(['resources/js/mainPage/*'], 'public/js/mainPage.js');

mix.browserSync('andens.loc');