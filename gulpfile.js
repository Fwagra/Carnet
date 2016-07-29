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
    mix.copy('node_modules/getmdl-select/getmdl-select.min.css','resources/assets/sass/modules/getmdl-select.scss');
    mix.copy('node_modules/dropzone/dist/min/basic.min.css','resources/assets/sass/modules/basic.scss');
    mix.copy('node_modules/dropzone/dist/min/dropzone.min.css','resources/assets/sass/modules/dropzone.scss');
    mix.copy('node_modules/fluidbox/dist/css/fluidbox.min.css', 'resources/assets/sass/modules/fluidbox.scss'),
    mix.copy('node_modules/dialog-polyfill/dialog-polyfill.css','public/css/dialog-polyfill.css');
    mix.copy('node_modules/dialog-polyfill/dialog-polyfill.js', 'public/js/polyfill.js');

    mix.sass([
        'modules/material-design-lite/material-design-lite.scss',
        'modules/getmdl-select.scss',
        'modules/basic.scss',
        'modules/dropzone.scss',
        'modules/fluidbox.scss',
        'resources/assets/sass/style.scss'
    ]);

    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/material-design-lite/material.min.js',
        '../../../node_modules/toastr/toastr.js',
        '../../../node_modules/getmdl-select/getmdl-select.min.js',
        '../../../node_modules/dropzone/dist/min/dropzone.min.js',
        '../../../node_modules/fluidbox/dist/js/jquery.fluidbox.min.js',
        'resources/assets/js'
    ], 'public/js/app.js');
});
