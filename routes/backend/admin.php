<?php

use App\Http\Controllers\Backend\DashboardController;


Route::redirect('/', '/user/dashboard', 301);
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::resource('categories', 'Admin\CategoryController');
