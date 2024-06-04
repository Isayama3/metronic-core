<?php

use Illuminate\Support\Facades\Route;

Route::get('list/countries/name', 'Country\CountryController@listName')->name('list.countries.name');
Route::get('list/countries/phone-code', 'Country\CountryController@listPhoneCode')->name('list.countries.phone.code');

Route::group(['middleware' => ['auth:user-api']], function () {
    Route::get('profile', 'User\UserController@getProfile')->name('profile');
    Route::post('update/profile', 'User\UserController@updateProfile')->name('profile');
});
