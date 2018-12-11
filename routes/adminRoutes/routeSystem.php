<?php

//角色列表
Route::get('system/list',[
    'as' => 'admin.system.list',
    'uses' => 'SystemController@list'
]);

Route::get('system/lock',[
    'as' => 'admin.system.lock',
    'uses' => 'SystemController@lock'
]);

Route::get('system/desktop',[
    'as' => 'admin.system.desktop',
    'uses' => 'SystemController@desktop'
]);

Route::get('system/word',[
    'as' => 'admin.system.word',
    'uses' => 'SystemController@word'
]);