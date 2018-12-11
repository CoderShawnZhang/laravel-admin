<?php
/**
 * 菜单路由
 */
Route::get('menu/list',[
    'as' => 'admin.menu.list',
    'uses' => 'MenuController@list'
]);
Route::get('menu/edit/{menu_id}',[
    'as' => 'admin.menu.edit',
    'uses' => 'MenuController@edit'
]);
Route::get('menu/destroy/{menu_id}',[
    'as' => 'admin.menu.destroy',
    'uses' => 'MenuController@destroy'
]);
Route::post('menu/update/{menu_id}',[
    'as' => 'admin.menu.update',
    'uses' => 'MenuController@update'
]);

Route::get('menu/create',[
    'as' => 'admin.menu.create',
    'uses' => 'MenuController@create'
]);
Route::get('menu/clear-cache',[
    'as' => 'admin.menu.clearCache',
    'uses' => 'MenuController@clearCache'
]);
Route::post('menu/search',[
    'as' => 'admin.menu.search',
    'uses' => 'MenuController@search'
]);
Route::post('menu/store',[
    'as' => 'admin.menu.store',
    'uses' => 'MenuController@store'
]);
