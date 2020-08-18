<?php

use App\Http\Controllers\Backend\DashboardController;


Route::redirect('/', '/user/dashboard', 301);
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

	// Categories Routes
	Route::resource('categories', 'Admin\CategoryController');
	Route::get('get-categories-data', ['uses' => 'Admin\CategoryController@getData', 'as' => 'categories.get_data']);

	Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoryController@massDestroy', 'as' => 'categories.mass_destroy']);

	Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoryController@restore', 'as' => 'categories.restore']);
	Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoryController@perma_del', 'as' => 'categories.perma_del']);

Route::group(['middleware' => 'role:administrator'], function () {

	//===== Teachers Routes =====//
	Route::resource('teachers', 'Admin\TeachersController');
	Route::get('get-teachers-data', ['uses' => 'Admin\TeachersController@getData', 'as' => 'teachers.get_data']);
	Route::post('teachers_mass_destroy', ['uses' => 'Admin\TeachersController@massDestroy', 'as' => 'teachers.mass_destroy']);
	Route::post('teachers_restore/{id}', ['uses' => 'Admin\TeachersController@restore', 'as' => 'teachers.restore']);
	Route::delete('teachers_perma_del/{id}', ['uses' => 'Admin\TeachersController@perma_del', 'as' => 'teachers.perma_del']);
	Route::post('teacher/status', ['uses' => 'Admin\TeachersController@updateStatus', 'as' => 'teachers.status']);
});