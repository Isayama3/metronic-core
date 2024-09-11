<?php

use App\Base\Events\SendNotification;
use Illuminate\Support\Facades\Route;

// Note :: Never change name of the routes, it will break everything.

Route::get('list/countries/name', 'Country\CountryController@listName')->name('list.countries.name');
Route::get('list/countries/phone-code', 'Country\CountryController@listPhoneCode')->name('list.countries.phone.code');
Route::get('list/available/languages', 'Language\LanguageController@listName')->name('list.available.languages.name');

Route::group(['middleware' => ['auth:user-api']], function () {
    Route::resource('chats', 'Chat\ChatController')->only(['index', 'show', 'store']);
    Route::get('chat/messages', 'Message\MessageController@index')->name('get.chat.messages');

    Route::post('complete-registration', 'Auth\AuthController@completeRegistration')->name('register');

    Route::resource('contact-us', 'ContactUs\ContactUsController')->only(['store']);

    Route::post('logout', 'Auth\AuthController@logout')->name('logout');

    Route::resource('notifications', 'Notification\NotificationController')->only(['index', 'destroy']);

    Route::get('profile', 'User\UserController@getProfile')->name('profile');
    Route::post('update/profile', 'User\UserController@updateProfile')->name('profile');
    Route::post('change/language', 'User\UserController@changeLanguage')->name('change.language');

    Route::resource('wallet', 'Wallet\WalletController')->only(['index', 'show']);
    Route::resource('wallet-transactions', 'Wallet\WalletTransactionController')->only(['index', 'show']);

    Route::get('about', 'Setting\SettingController@about')->name('about');
    Route::get('terms', 'Setting\SettingController@terms')->name('terms');

    Route::get('send-test-notification', function () {
        $user = auth('user-api')->user();
        event(new SendNotification(
            users: $user,
            title: 'test title',
            body: 'test body',
            icon_path: 'images/notifications/test.png',
            target_id: 1,
            target_type: 'App\Models\Ride',
        ));

        return 'done';
    });
});
