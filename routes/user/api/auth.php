<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login')->name('login');
Route::post('register', 'AuthController@register')->name('register');
Route::post('verify-otp', 'AuthController@verifyOTP')->name('verify.otp');
Route::post('resend-otp', 'AuthController@resendOTP')->name('resend.otp');
Route::post('forgot-password', 'AuthController@forgotPassword')->name('forgot.password');
Route::group(['middleware' => 'auth:user-api'], function () {
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset.password');
});
