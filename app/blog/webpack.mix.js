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
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/ckeditor/config.js', 'public/js/ckeditor/config.js')
    .copy('node_modules/ckeditor/styles.js', 'public/js/ckeditor/styles.js')
    .copy('node_modules/ckeditor/contents.css', 'public/js/ckeditor/contents.css')
    .copyDirectory('node_modules/ckeditor/skins', 'public/js/ckeditor/skins')
    .copyDirectory('node_modules/ckeditor/lang', 'public/js/ckeditor/lang')
    .copyDirectory('node_modules/ckeditor/plugins', 'public/js/ckeditor/plugins');
