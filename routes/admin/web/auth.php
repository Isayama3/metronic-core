<?php

use Illuminate\Support\Facades\Route;

// Note :: Never change name of the routes, it will break everything.

Route::get('login', "AuthController@loginView")->name('login.form');
Route::post('login', "AuthController@loginPost")->name('login.post');
