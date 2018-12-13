var elixir = require('laravel-elixir');

elixir(function(mix) {
    //jQuery
    mix.copy('node_modules/jquery/dist/jquery.min.js','resources/assets/admin/js/');

    //Bootstrap
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js','resources/assets/admin/js/');   //js
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css','resources/assets/admin/css/');//css
    mix.copy('node_modules/bootstrap/dist/fonts','public/assets/admin/fonts/');//fonts

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
    mix.copy('node_modules/font-awesome/fonts/', 'public/build/assets/admin/fonts/');

    // Login Background Images
    mix.copy('resources/assets/images/background/', 'public/assets/admin/images/background/');

    // SweetAlter
    mix.copy("node_modules/sweetalert/dist/sweetalert.css", "resources/assets/admin/css");
    mix.copy("node_modules/sweetalert/dist/sweetalert.min.js", "resources/assets/admin/js");

    // Font-Awesome
    mix.copy('node_modules/font-awesome/css/font-awesome.min.css', 'resources/assets/admin/css/');
    mix.copy('node_modules/bootstrap/dist/fonts','public/build/assets/admin/fonts/');

    // 文本编辑器
    mix.copy('node_modules/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css', 'resources/assets/admin/css');
    //mix.copy('node_modules/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js', 'resources/assets/admin/js/bootstrap3-wysihtml5.all.js');

    //合并上传头像样式文件
    mix.styles(['cropper.min.css','sitelogo.css'],'public/assets/admin/css/uploadImage/uploadImage.min.css','resources/assets/admin/upload/css');
    //合并上传头像脚本文件
    mix.scripts(['cropper.min.js','sitelogo.js'],'public/assets/admin/js/uploadImage/uploadImage.min.js','resources/assets/admin/upload/js');
    mix.copy('resources/assets/admin/upload/UploadDefaultImage.jpg', 'public/assets/admin/images/UploadDefaultImage.jpg');

    mix.copy('resources/assets/images/loginBackground.jpg','public/assets/images/loginBackground.jpg');
    //合并文本编辑器样式文件
    mix.styles([
        'bootstrap3-wysihtml5.css'
    ],
    'public/assets/admin/css/editor/editor.min.css','resources/assets/admin/css');

    //合并CSS样式文件
    mix.styles([
        'select2.min.css',
        'daterangepicker.css',
        'bootstrap.min.css',
        'font-awesome.min.css',
        'adminlte.min.css',
        'adminlte-skin.min.css',
        'sweetalert.css',
        'common.css',
        '_all-skins.min.css'
    ],
    'public/assets/admin/css/app.min.css','resources/assets/admin/css');


///
     mix.copy('resources/assets/js/app.js', 'public/pusher/app.js');
     mix.copy('resources/assets/js/bootstrap.js', 'public/pusher/bootstrap.js');
///
    //合并文本编辑器脚本文件
    mix.scripts([
        'bootstrap3-wysihtml5.all.min.js'
    ],
    'public/assets/admin/js/editor/editor.min.js','resources/assets/admin/js');

    //合并Javascript脚本文件
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'select2.full.min.js',
        'moment.min.js',
        'daterangepicker.js',
        'adminlte.min.js',
        'sweetalert.min.js',
        'common.js'
    ],'public/assets/admin/js/app.min.js','resources/assets/admin/js');

    // 监控文件变动，自动刷新浏览器
    mix.browserSync({
        files: [
            'app/**/*',
            'public/**/*',
            'resources/views/**/*'
        ],
        port: 5000,
        proxy: 'localhost:8000'
    });

    // 生成版本和缓存清除
    mix.version([
        'assets/admin/js/app.min.js',
        'assets/admin/css/app.min.css',
        'assets/admin/js/app.min.js',
        'assets/admin/css/app.min.css'
    ]);
});
