<?php

use Illuminate\Support\Facades\Route;

$excepts = ['create', 'edit'];

Route::group(['prefix' => 'v1'], function () use ($excepts) {

    //PUBLIC ROUTES
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'Api\v1\AuthController@login')->name('login');
        Route::get('/signup/activate/{token}', 'Api\v1\AuthController@signupActivate')->name('signup.active');
        Route::post('/password/forgot', 'Auth\ForgotPasswordController@forgotPassword')->name('password.forgot');
        Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
        Route::post('/logout', 'Api\v1\AuthController@logout')->name('logout')->middleware('auth:api');
        Route::get('/user', function () {
            return auth()->guard('api')->user();
        });
    });

    Route::namespace('Api\v1')->middleware('auth:api')->group(function () use ($excepts) {
        Route::resource('profiles', 'ProfileController', ['except' => $excepts]);
        Route::resource('roles', 'RoleController', ['except' => $excepts]);
        Route::resource('users', 'UserController', ['except' => $excepts]);
        Route::resource('clients', 'ClientController', ['except' => $excepts]);
    });
});

