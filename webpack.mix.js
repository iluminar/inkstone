const { mix } = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.js('resources/assets/js/home.js', 'public/js')
   .js('resources/assets/js/post.js', 'public/js')
   .js('resources/assets/js/userPosts.js', 'public/js')
   .js('resources/assets/js/edit.js', 'public/js')
   .js('resources/assets/js/userGithub.js', 'public/js')
   .js('resources/assets/js/create.js', 'public/js');
