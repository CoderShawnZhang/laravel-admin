<?php

//后台测试路由！！！
Route::get('/','TestController@index');

//后台首页-桌面
Route::get('admin/index','IndexController@index');

//menu-route
require_once __DIR__ . '/routeMenu.php';

//user-route
require_once __DIR__ . '/routeUser.php';

//role-route
require_once __DIR__ . '/routeRole.php';

//permission-route
require_once __DIR__ . '/routePermission.php';

//system-route
require_once __DIR__ .'/routeSystem.php';

//task-route
require_once __DIR__ . '/routeTask.php';

//job-route
require_once __DIR__ . '/routeJob.php';