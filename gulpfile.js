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
    mix.styles([
                'bootstrap.css',
                'style.css',
                'font-awesome.css',
                'sweetalert.css',
                'style_cesar.css'],'./public/css/template.css')
        .scripts([
            'template/jquery-2.1.1.min.js',
            'template/jquery.nicescroll.js',
            'template/nicescroll_script.js',
            'template/scripts.js',
            'template/sticky-nav.js',
            'template/sweetalert.min.js',
            'template/bootstrap.js',],'./public/js/template.js')
        .webpack('app.js','./public/js/vue.js');
});


