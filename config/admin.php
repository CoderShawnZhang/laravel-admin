<?php
return [
    'system' => [
        'title' =>  ' Admin 系统',
        'logo' =>  elixir('logo.png'),
        'login_background_img' => elixir('assets/images/loginBackground.jpg')
    ],
    'httpHost'=>'http://'.$_SERVER['HTTP_HOST'].'/',
    'uploadImage' => [
        'base_path'         =>  'upload/images/',
        'extension'         =>  [],
        'max_size'          =>  10 * 1024,
        'name'              =>  sha1(time()),
        'form_input_name'   => 'avatar_file',
        'viewParams' => [
            'title' => '上传头像',
            'inputFileName' => '图片上传',
            'exampleLogo' => elixir('assets/admin/images/UploadDefaultImage1.jpeg'),
            'buts' => [
                'left' => '向左旋转',
                'right' => '向右旋转'
            ],
            'submitName' => '保存修改',
        ]
    ],
    'adminSkin' => 'skin-default',        //修改主题颜色
];



