const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/trivia.css', 'public/css', [
    ])
    .postCss('node_modules/@fortawesome/fontawesome-free/css/all.css', 'public/css', [
    ]);
