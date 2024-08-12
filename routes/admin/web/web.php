<?php

use Illuminate\Support\Facades\Route;

Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::get('profile', 'Auth\AuthController@updateProfileView')->name('profile.view');
Route::put('profile', 'Auth\AuthController@updateProfile')->name('profile.post');

Route::group(['middleware' => 'check.permission'], function () {

    Route::get('home', 'Home\HomeController@index')->name('home.index');

    Route::resource('admins', 'Admin\AdminController');

    Route::resource('users', 'User\UserController');
    Route::get('user/toggle-boolean/{id}/{action}', 'User\UserController@toggleBoolean')->name('users.toggleBoolean.active');

    Route::resource('roles', 'Role\RoleController');

    Route::get('settings/about', 'Setting\SettingController@about')->name('settings.about.view');
    Route::post('settings/about', 'Setting\SettingController@updateAbout')->name('settings.about.update');

    Route::get('settings/terms', 'Setting\SettingController@terms')->name('settings.terms.view');
    Route::post('settings/terms', 'Setting\SettingController@updateTerm')->name('settings.terms.update');

    Route::get('settings/main-config', 'Setting\SettingController@mainConfig')->name('settings.main-config.view');
    Route::post('settings/main-config', 'Setting\SettingController@updateMainConfig')->name('settings.main-config.update');
});
