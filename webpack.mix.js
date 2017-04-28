const { mix } = require('laravel-mix');

mix.options({ processCssUrls: false });

// Inspinia
    mix.sass('resources/assets/sass/app.scss', 'public/css')
        .combine([
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/animate.css/animate.min.css',
            'node_modules/font-awesome/css/font-awesome.min.css',
            'node_modules/sweetalert/dist/sweetalert.css',
            'node_modules/node-waves/dist/waves.min.css'
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
        'resources/assets/utilities/delete.js',
    ], 'public/js/index.js');
