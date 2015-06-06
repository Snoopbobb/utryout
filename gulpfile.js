var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');

     mix.copy(
      'vendor/bower_components/jquery/dist/jquery.js',
      'resources/assets/js/jquery.js'
    )
    .copy(
      'vendor/bower_components/bootstrap/dist/js/bootstrap.js',
      'resources/assets/js/bootstrap.js'
    )
    .copy(
      'vendor/bower_components/vue/dist/vue.js',
      'resources/assets/js/vue.js'
    )
    .copy(
      'vendor/bower_components/bootstrap/less',
      'resources/assets/less/bootstrap'
    )
    .copy(
      'vendor/bower_components/bootstrap/dist/fonts',
      'public/adm/fonts'
    )

    .copy(
      'vendor/bower_components/bootstrap/css/bootstrap.css',
      'public/adm/css'
    )
    .copy(
      'vendor/bower_components/animate.css/',
      'public/adm/css'
    )
    .copy(
      'vendor/bower_components/vegas/dist/vegas.js',
      'resources/assets/js/vegas.js'
    )
    .copy(
      'vendor/bower_components/vegas/dist/vegas.js',
      'public/adm/js/vegas.js'
    )
    .copy(
      'vendor/bower_components/vegas/dist/vegas.css',
      'public/adm/css'
    )

    .scripts([
        'js/jquery.js',
        'js/bootstrap.js',
        'js/vue.js',
        'js/vegas.js'
      ],
      'public/adm/js/admin.js',
      'resources/assets'
    )

    .less('app.less', 'public/adm/css')

    ;
});
