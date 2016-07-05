var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('node_modules/material-design-lite/material.min.css','resources/assets/sass/modules/material.min.scss');
    mix.copy('node_modules/toastr/toastr.scss','resources/assets/sass/modules/toastr.scss');
    mix.sass([
        'app.scss',
    ]);

    mix.scripts([
        '../../../node_modules/material-design-lite/material.min.js',
        '../../../node_modules/toastr/toastr.js'
    ], 'public/js/app.js');
});
