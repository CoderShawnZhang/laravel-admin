let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/echo.js', 'public/js');

//jQuery
mix.copy('node_modules/jquery/dist/jquery.min.js','resources/assets/admin/js/');

//Bootstrap
mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js','resources/assets/admin/js/');   //js
mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css','resources/assets/admin/css/');//css
// mix.copy('node_modules/bootstrap/dist/fonts','public/assets/admin/fonts/');//fonts

//AdminLTE
mix.copy('node_modules/admin-lte/dist/img/','public/assets/admin/images/');
mix.copy('node_modules/admin-lte/dist/js/adminlte.min.js','resources/assets/admin/js/adminlte.min.js');
mix.copy('node_modules/admin-lte/dist/css/AdminLTE.min.css','resources/assets/admin/css/adminlte.min.css');
mix.copy('node_modules/admin-lte/dist/css/skins/skin-black.min.css','resources/assets/admin/css/adminlte-skin.min.css');
mix.copy('node_modules/admin-lte/dist/css/skins/_all-skins.css','resources/assets/admin/css/_all-skins.min.css');

mix.copy('node_modules/admin-lte/plugins/*','resources/assets/admin/js/plugins/');
mix.copy('node_modules/select2/dist/css/select2.min.css','resources/assets/admin/css/');
mix.copy('node_modules/select2/dist/js/select2.full.min.js','resources/assets/admin/js/');
mix.copy('node_modules/bootstrap-daterangepicker/moment.min.js','resources/assets/admin/js/');
mix.copy('node_modules/bootstrap-daterangepicker/daterangepicker.js','resources/assets/admin/js/');
mix.copy('node_modules/bootstrap-daterangepicker/daterangepicker.css','resources/assets/admin/css/');

// Font-Awesome
mix.copy('node_modules/font-awesome/css/font-awesome.min.css', 'resources/assets/admin/css/');
mix.copy('node_modules/font-awesome/fonts/', 'public/assets/admin/fonts/');

// Login Background Images
mix.copy('resources/assets/images/background/', 'public/assets/admin/images/background/');

// SweetAlter
mix.copy("node_modules/sweetalert/dist/sweetalert.css", "resources/assets/admin/css");
mix.copy("node_modules/sweetalert/dist/sweetalert.min.js", "resources/assets/admin/js");



// 文本编辑器
mix.copy('node_modules/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css', 'resources/assets/admin/css');

//合并上传头像样式文件
mix.styles(['resources/assets/admin/upload/css/cropper.min.css','resources/assets/admin/upload/css/sitelogo.css'],'public/assets/admin/css/uploadImage/uploadImage.min.css');
//合并上传头像脚本文件
mix.scripts(['resources/assets/admin/upload/js/cropper.min.js','resources/assets/admin/upload/js/sitelogo.js'],'public/assets/admin/js/uploadImage/uploadImage.min.js');
mix.copy('resources/assets/admin/upload/UploadDefaultImage.jpg', 'public/assets/admin/images/UploadDefaultImage.jpg');

// mix.copy('resources/assets/images/loginBackground.jpg','public/assets/images/loginBackground.jpg');
//合并文本编辑器样式文件
mix.styles([
        'resources/assets/admin/css/bootstrap3-wysihtml5.css'
    ],
'public/assets/admin/css/editor/editor.min.css');

//合并CSS样式文件
mix.styles([
        'resources/assets/admin/css/select2.min.css',
        'resources/assets/admin/css/daterangepicker.css',
        'resources/assets/admin/css/bootstrap.min.css',
        'resources/assets/admin/css/font-awesome.min.css',
        'resources/assets/admin/css/adminlte.min.css',
        'resources/assets/admin/css/adminlte-skin.min.css',
        'resources/assets/admin/css/sweetalert.css',
        'resources/assets/admin/css/common.css',
        'resources/assets/admin/css/_all-skins.min.css'
],
'public/assets/admin/css/app.min.css');


mix.copy('resources/assets/js/app.js', 'public/pusher/app.js');
mix.copy('resources/assets/js/bootstrap.js', 'public/pusher/bootstrap.js');

//合并文本编辑器脚本文件
mix.scripts([
    'resources/assets/admin/js/bootstrap3-wysihtml5.all.min.js'
],
'public/assets/admin/js/editor/editor.min.js');

//合并Javascript脚本文件
mix.scripts([
    'resources/assets/admin/js/jquery.min.js',
    'resources/assets/admin/js/bootstrap.min.js',
    'resources/assets/admin/js/select2.full.min.js',
    'resources/assets/admin/js/moment.min.js',
    'resources/assets/admin/js/daterangepicker.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/sweetalert.min.js',
    'resources/assets/admin/js/common.js'
],'public/assets/admin/js/app.min.js');



