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
mix.js('resources/assets/js/pages/home.js', 'public/js')
   .js('resources/assets/js/pages/auth/login.js', 'public/js/auth')
   .js('resources/assets/js/pages/auth/register.js', 'public/js/auth')
   .js('resources/assets/js/pages/auth/email.js', 'public/js/auth')
   .js('resources/assets/js/pages/auth/reset.js', 'public/js/auth')
   .js('resources/assets/js/pages/posts/post.js', 'public/js/posts')
   .js('resources/assets/js/pages/posts/create.js', 'public/js/posts')
   .js('resources/assets/js/pages/posts/edit.js', 'public/js/posts')
   .js('resources/assets/js/pages/users/posts.js', 'public/js/users')
   .js('resources/assets/js/pages/users/github.js', 'public/js/users');
