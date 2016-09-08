const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 <!--scrolling js-->
 <script src="js/jquery.nicescroll.js"></script>
 <script src="js/scripts.js"></script>
 <!--//scrolling js-->
 <script src="js/bootstrap.js"> </script>
 <!-- mother grid end here-->
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .styles(['bootstrap.css','demo-page.css','examples.css',
            'font-awesome.css','hover.css',
            'magnific-popup.css','style.css','style_cesar.css'])
        .scripts([
            'template/jquery-2.1.1.js',
            'template/jquery.nicescroll.js',
            'template/bars.js',
            'template/jquery.magnific-popup.js',
            'template/modernizr.min.js',
            'template/nivo-lightbox.min.js',
            'template/skycons.js',
            'template/scripts.js',
            'template/bootstrap.js'],'./public/js/template.js')
        .webpack('app.js');
});


