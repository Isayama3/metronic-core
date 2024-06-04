<?php

use Illuminate\Support\Facades\Route;

Route::get('login', "AuthController@loginView")->name('login.form');
Route::post('login', "AuthController@loginPost")->name('login.post');
