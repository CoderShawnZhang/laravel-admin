<?php
Route::get('job/list',[
   'as' => 'admin.job.list',
   'uses' => 'JobController@list'
]);

