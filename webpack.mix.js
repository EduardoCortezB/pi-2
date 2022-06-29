const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/vendor/main-tmp.js', 'public/js/vendor/main-tmp.js')
    .scripts('resources/js/panel/script.js', 'public/js/panel/main.js')
    .scripts('resources/js/app/form-register.js', 'public/js/app/form-reg.js')
    .styles('resources/css/vendor/main.css', 'public/css/vendor/main-tmp.css')
    .version()
