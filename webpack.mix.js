const mix = require('laravel-mix');

mix.disableNotifications()

mix.js('resources/js/app.js', 'public/js')
    .vue()

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
