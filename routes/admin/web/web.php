<?php

use App\Base\Events\SendNotification;
use App\Models\RideRequest;
use Illuminate\Support\Facades\Route;

// Note :: Never change name of the routes, it will break everything.

Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::get('profile', 'Auth\AuthController@updateProfileView')->name('profile.view');
Route::put('profile', 'Auth\AuthController@updateProfile')->name('profile.post');

Route::group(['middleware' => 'check.permission'], function () {
    Route::get('test-notification', function () {
        event(new SendNotification(
            users: auth('admin')->user(),
            title: "New ride request.",
            body: "New ride request.",
            icon_path: 'images/notifications/complete-ride.png',
            target_type: get_class(new RideRequest()),
            target_id: 1
        ));
        return 'test';
    });
    Route::get('home', 'Home\HomeController@index')->name('home.index');
    Route::get('statistics', 'Statistics\StatisticsController@index')->name('statistics.index');

    Route::resource('admins', 'Admin\AdminController');

    Route::resource('users', 'User\UserController');
    Route::get('users/wallet/{id}', 'User\UserController@showWallet')->name('users.wallet');
    Route::post('users/wallet/{id}', 'User\UserController@addToWallet')->name('users.add.to.wallet');

    Route::get('user/toggle-boolean/{id}/{action}', 'User\UserController@toggleBoolean')->name('users.toggleBoolean.active');
    Route::get('user/verify/{user_id}/{action}', 'User\UserVerificationController@verify')->name('users.verify');
    Route::get('user/un-verify/{user_id}/{action}', 'User\UserVerificationController@unVerify')->name('users.un-verify');

    Route::resource('roles', 'Role\RoleController');

    
    Route::get('settings/about', 'Setting\SettingController@about')->name('settings.about.view');
    Route::post('settings/about', 'Setting\SettingController@updateAbout')->name('settings.about.update');

    Route::get('settings/terms', 'Setting\SettingController@terms')->name('settings.terms.view');
    Route::post('settings/terms', 'Setting\SettingController@updateTerm')->name('settings.terms.update');

    Route::get('settings/main-config', 'Setting\SettingController@mainConfig')->name('settings.main-config.view');
    Route::post('settings/main-config', 'Setting\SettingController@updateMainConfig')->name('settings.main-config.update');
});
