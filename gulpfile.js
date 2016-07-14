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
    mix.copy('node_modules/material-design-lite/src','resources/assets/sass/modules/material-design-lite');
    mix.copy('resources/assets/sass/_variables.scss','resources/assets/sass/modules/material-design-lite/_variables.scss');
    mix.copy('node_modules/toastr/toastr.scss','resources/assets/sass/modules/toastr.scss');
    mix.copy('node_modules/dialog-polyfill/dialog-polyfill.css','resources/assets/sass/modules/dialog-polyfill.css');
    mix.copy('node_modules/dialog-polyfill/dialog-polyfill.js', 'public/js/polyfill.js')
    mix.sass([
        'modules/material-design-lite/material-design-lite.scss',
        'resources/assets/sass/style.scss'
    ]);

    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/material-design-lite/material.min.js',
        '../../../node_modules/toastr/toastr.js',
        'resources/assets/js'
    ], 'public/js/app.js');
});
