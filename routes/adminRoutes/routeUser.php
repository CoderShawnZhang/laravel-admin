<?php
/**
 * 用户路由
 */
Route::get('user/list',[
    'as' => 'admin.user.list',
    'uses' => 'UserController@list'
]);
//新增界面
Route::get('user/create',[
    'as' => 'admin.user.create',
    'uses' => 'UserController@create'
]);

//新增用户
Route::post('user/store',[
    'as' => 'admin.user.store',
    'uses' => 'UserController@store'
]);

//编辑用户
Route::get('user/edit/{user_id}',[
     'as' => 'admin.user.edit',
     'uses' => 'UserController@edit'
]);

//删除用户
Route::get('user/destroy/{use_id}',[
   'as' => 'admin.user.destroy',
   'uses' => 'UserController@destroy'
]);

//用户权限
Route::get('user/permission',[
    'as' => 'admin.user.permission',
    'uses' => 'UserController@permission'
]);

//查看用户
Route::get('user/show/{user_id}',[
    'as' => 'admin.user.show',
    'uses' => 'UserController@show',
]);
//用户查询
Route::get('user/search',[
   'as' => 'admin.user.search',
   'uses' => 'UserController@search'
]);

//上传
Route::post('user/upload',[
    'as' => 'admin.user.upload',
    'uses' => 'UserController@upload'
]);

//验证用户权限
Route::get('user/check-role',[
    'as' => 'admin.user.checkRole',
    'uses' => 'UserController@checkRole'
]);