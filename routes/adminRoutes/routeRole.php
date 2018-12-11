<?php

//角色列表
Route::get('role/list',[
    'as' => 'admin.role.list',
    'uses' => 'RoleController@list'
]);

//新增页面
Route::get('role/create',[
    'as' => 'admin.role.create',
    'uses' => 'RoleController@create'
]);

//新增角色
Route::post('role/store',[
    'as' => 'admin.role.store',
    'uses' => 'RoleController@store'
]);

//删除角色
Route::get('role/destroy/{role_id}',[
    'as' => 'admin.role.destroy',
    'uses' => 'RoleController@destroy'
]);
//角色详情
Route::get('role/detail',[
    'as' => 'admin.role.detail',
    'uses' => 'RoleController@detail'
]);

//上传角色头像
Route::post('role/upload',[
    'as' => 'admin.role.upload',
    'uses' => 'RoleController@upload'
]);