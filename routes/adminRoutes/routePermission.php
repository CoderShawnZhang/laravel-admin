<?php

Route::get('permission/list',[
    'as' => 'admin.permission.list',
    'uses' => 'PermissionController@list'
]);

Route::get('permission/ajax',[
    'as' => 'admin.permission.ajax',
    'uses' => 'PermissionController@ajax'
]);

//设置角色权限
Route::post('permission/set-roles-permission',[
    'as' => 'admin.permission.setRolesPermission',
    'uses' => 'PermissionController@setRolesPermission'
]);

//创建权限页面
Route::get('permission/create',[
    'as' => 'admin.permission.create',
    'uses' => 'PermissionController@create'
]);

//创建权限
Route::post('permission/store',[
    'as' => 'admin.permission.store',
    'uses' => 'PermissionController@store'
]);

//修改权限页面
Route::get('permission/edit',[
    'as' => 'admin.permission.edit',
    'uses' => 'PermissionController@edit'
]);

//修改权限
Route::post('permission/update',[
    'as' => 'admin.permission.update',
    'uses' => 'PermissionController@update'
]);