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

mix.scripts('node_modules//jquery/dist/jquery.js', 'public/js/jquery.js')
   .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.js')
   .scripts('resources/js/app.js', 'public/js/app.js')
   .scripts('resources/js/admin.js', 'public/js/admin.js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css/admin.css');

    mix.browserSync({
        proxy: 'laravelstore.test',
        open: false
    });
