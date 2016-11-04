const elixir = require('laravel-elixir');

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

elixir(mix => {
    mix.sass('app.scss');
    mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts')
    mix.styles([
        'resources/assets/vendor/bootstrap/css/bootstrap.css',
        'resources/assets/vendor/animate/animate.css',
        'resources/assets/vendor/font-awesome/css/font-awesome.css',
    ], 'public/css/vendor.css', './');
    mix.scripts([
        'resources/assets/vendor/jquery/jquery-2.1.1.js',
        'resources/assets/vendor/bootstrap/js/bootstrap.js',
        'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
        'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
        'resources/assets/vendor/pace/pace.min.js',
        'resources/assets/js/app.js'
    ], 'public/js/app.js', './');


    mix.styles([
        'css/plugins/iCheck/custom.css',
        'css/plugins/steps/jquery.steps.css',
        'css/plugins/jasny/jasny-bootstrap.min.css',
        'css/style.css',
    ], install.css)
    

    mix.scripts([

    'js/plugins/staps/jquery.steps.min.js',
    'js/plugins/validate/jquery.validate.min.js',
    'js/plugins/jasny-bootstrap.min.js',
    
    ], install.js)


});
