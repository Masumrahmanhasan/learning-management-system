<?php

use App\Http\Controllers\Auth\LoginController;

Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function() {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'password_expires'], function () {
        // Change Password Routes
        Route::patch('password/update', [UpdatePasswordController::class, 'update'])->name('password.update');
    });

    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.post');


         Route::get('register', [LoginController::class, 'showLoginForm'])->name('register');
            Route::post('register', [RegisterController::class, 'register'])->name('register.post');

            
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.email');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email.post');

        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');

        // New Register Teacher Routes
        Route::get('teacher/register',[TeacherRegisterController::class, 'showTeacherRegistrationForm'])->name('teacher.register');
        Route::post('teacher/register', [TeacherRegisterController::class, 'register'])->name('teacher.register.post');
    });
});