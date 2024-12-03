const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')  // Compilar o JavaScript
    .sass('resources/css/app.scss', 'public/css')  // Compilar o SCSS
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer')
    ]);