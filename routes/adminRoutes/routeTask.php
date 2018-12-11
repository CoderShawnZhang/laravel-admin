<?php
Route::get('task/list',[
   'as' => 'admin.task.list',
   'uses' => 'TaskController@list'
]);

Route::get('task/set',[
   'as' => 'admin.task.set',
   'uses' => 'TaskController@set'
]);

Route::get('task/create',[
   'as' => 'admin.task.create',
   'uses' => 'TaskController@create'
]);

Route::post('task/store',[
   'as' => 'admin.task.store',
   'uses' => 'TaskController@store'
]);

Route::any('task/open',[
    'as' => 'admin.task.open',
    'uses' => 'TaskController@open'
]);

Route::any('task/close',[
    'as' => 'admin.task.close',
    'uses' => 'TaskController@close'
]);

Route::get('task/clear-cache',[
   'as' => 'admin.task.clearCache',
   'uses' => 'TaskController@clearCache'
]);