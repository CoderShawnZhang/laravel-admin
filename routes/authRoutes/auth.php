<?php
Route::get('auth/login','LoginController@login');
Route::post('auth/postlogin','LoginController@postlogin');