const { mix } = require('laravel-mix');

mix.options({ processCssUrls: false });

// Inspinia
    mix.sass('resources/assets/sass/app.scss', 'public/css')
        .combine([
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/animate.css/animate.min.css',
            'node_modules/font-awesome/css/font-awesome.min.css',
            'node_modules/sweetalert/dist/sweetalert.css',
            'node_modules/node-waves/dist/waves.min.css',
            'node_modules/toastr/build/toastr.min.css'
        ], 'public/css/inspinia.css')
        .scripts([
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/metismenu/dist/metisMenu.min.js',
            'node_modules/jquery-slimscroll/jquery.slimscroll.min.js',
            'resources/assets/vendor/pace/pace.min.js',
            'resources/assets/vendor/inspinia.js',
            'node_modules/sweetalert/dist/sweetalert.min.js',
            'node_modules/node-waves/dist/waves.min.js',
            'node_modules/toastr/build/toastr.min.js',
            'resources/assets/utilities/init.js'
        ], 'public/js/inspinia.js');

// Images
    mix.copy('resources/assets/img/header-profile-skin-3.png', 'public/css/patterns');
    mix.copy('resources/assets/img/prochile.svg', 'public/img');
    mix.copy('resources/assets/img/prochile.png', 'public/img');
    mix.copy([
        'node_modules/bootstrap/fonts',
        'node_modules/font-awesome/fonts',
    ], 'public/fonts');

// Create-Edit
    mix.scripts('resources/assets/utilities/submit.js', 'public/js/create-edit.js');

// Index
    mix.scripts([
        'resources/assets/utilities/delete.js'
    ], 'public/js/index.js');

// Reports
    mix.scripts([
        'node_modules/chart.js/dist/Chart.min.js'
    ], 'public/js/reports.js')

// Assistances
    // Create-Edit
        mix.scripts([
            'node_modules/jquery.rut/jquery.rut.min.js',
            'resources/assets/utilities/valida_rut.js',
            'resources/assets/utilities/valida_email.js',
            'resources/assets/utilities/change_industries.js'
        ], 'public/js/assistances/create-edit.js');

// Users
    // Create-Edit
        mix.scripts('resources/assets/utilities/valida_email.js', 'public/js/users/create-edit.js');

// Passport
    mix.copy('resources/assets/passport/app.css', 'public/css/passport.css');
    mix.copy('resources/assets/passport/app.js', 'public/js/passport.js');

// Versioning
    mix.version();



