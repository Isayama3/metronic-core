<?php

use Illuminate\Support\Facades\Route;

Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::get('profile', 'Auth\AuthController@updateProfileView')->name('profile.view');
Route::put('profile', 'Auth\AuthController@updateProfile')->name('profile.post');

Route::get('home', 'Home\HomeController@index')->name('home.index');

Route::resource('admins', 'Admin\AdminController');

Route::resource('users', 'User\UserController');
Route::get('user/toggle-boolean/{id}/{action}', 'User\UserController@toggleBoolean')->name('users.toggleBoolean.active');

Route::resource('roles', 'Role\RoleController');
