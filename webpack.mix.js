let mix = require('laravel-mix');

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

mix.webpackConfig({
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    }
});

mix.js('resources/assets/js/app.js', 'public/js')
    .extract(['vue', 'moment', 'fullcalendar', 'axios','materialize-css'])
    .stylus('resources/assets/stylus/app.styl', 'public/css')
    .styles([
        "node_modules/materialize-css/dist/css/materialize.css",
        "node_modules/fullcalendar/dist/fullcalendar.css",

    ],'public/css/vendor.css')
    .copyDirectory('resources/assets/img', 'public/img');

mix.autoload({
    jquery: ['$', 'window.jQuery']
});
