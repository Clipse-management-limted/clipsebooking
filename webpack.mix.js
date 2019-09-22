const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

    // mix.js('resources/js/app.js', 'public/js')
    //    .sass('resources/sass/app.scss', 'public/css');
    // mix.styles([
    //
    //     'public/assets/materialDesign/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css',
    //     'public/assets/materialDesign/vendors/bower_components/animate.css/animate.min.css',
    //     'public/assets/materialDesign/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css',
    //     'public/assets/materialDesign/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css',
    //     'public/assets/materialDesign/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
    //     'public/assets/materialDesign/css/app.min.1.css',
    //     'public/assets/materialDesign/css/app.min.2.css',
    //     'public/assets/materialDesign/css/style.css'
    //     ],
    //      'public/css/all.css');
    // mix.scripts([
    //     'public/assets/materialDesign/vendors/bower_components/jquery/dist/jquery.min.js',
    //    'public/assets/materialDesign/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js',
    //   'public/assets/materialDesign/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js',
    //  'public/assets/materialDesign/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'
    // ], 'public/js/all.js');
    mix.js('resources/js/app.js', 'public/js')
        .sass('resources/sass/app.scss', 'public/css')
        .styles([
            'public/an/bootstrap/css/bootstrap.min.css',
            'public/an/plugins/datatables/dataTables.bootstrap.css',
            // 'public/an/plugins/select2/select2.min.css',
            'public/an/dist/css/AdminLTE.min.css',
            'public/an/dist/css/skins/_all-skins.min.css',
            // 'public/an/plugins/iCheck/flat/blue.css',
            // 'public/an/plugins/datepicker/datepicker3.css',
            // 'public/an/plugins/daterangepicker/daterangepicker-bs3.css',
            // 'public/an/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
           'public/an/dist/css/toastr.min.css'

        ], 'public/css/site.css')
        .scripts([

      'public/an/plugins/jQuery/jQuery-2.1.4.min.js',
       // 'public/an/plugins/select2/select2.full.min.js',
       //      'public/an/plugins/input-mask/jquery.inputmask.js',
       //    'public/an/plugins/input-mask/jquery.inputmask.date.extensions.js',
       //    'public/an/plugins/input-mask/jquery.inputmask.extensions.js',
       'public/an/bootstrap/js/bootstrap.min.js',
       'public/an/plugins/slimScroll/jquery.slimscroll.min.js',
       // 'public/an/plugins/fastclick/fastclick.min.js',
       'public/an/dist/js/app.min.js',
       // 'public/an/dist/js/demo.js',
       // 'public/an/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
           'public/an/dist/js/validator.min.js',
               'public/an/dist/js/toastr.min.js',
      'public/an/dist/js/postsAjax.js'
        ], 'public/js/site.js');
