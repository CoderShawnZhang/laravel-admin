<?php
/* 系统登录 */
Route::group([
    'namespace' => 'Auth'
],function(){
    require_once __DIR__ . '/authRoutes/auth.php';
});
/* 后台管理模块 */
Route::group([
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'middleware' => ['auth'],
],function(){
    require_once __DIR__ . '/adminRoutes/admin.php';
});

//接收广播页面
Route::get('admin/job/guangbo',[
    'as' => 'admin.job.guangbo',
    'uses' => 'Admin\JobController@guangbo'
]);

//vue测试
Route::get('admin/job/vue',[
    'as' => 'admin.job.vue',
    'uses' => 'Admin\JobController@vue'
]);

Auth::routes();