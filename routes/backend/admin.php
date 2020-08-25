<?php

use App\Http\Controllers\Backend\DashboardController;


Route::redirect('/', '/user/dashboard', 301);
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'role:administrator'], function () {

	//===== Teachers Routes =====//
	Route::resource('teachers', 'Admin\TeachersController');
	Route::get('get-teachers-data', ['uses' => 'Admin\TeachersController@getData', 'as' => 'teachers.get_data']);
	Route::post('teachers_mass_destroy', ['uses' => 'Admin\TeachersController@massDestroy', 'as' => 'teachers.mass_destroy']);
	Route::post('teachers_restore/{id}', ['uses' => 'Admin\TeachersController@restore', 'as' => 'teachers.restore']);
	Route::delete('teachers_perma_del/{id}', ['uses' => 'Admin\TeachersController@perma_del', 'as' => 'teachers.perma_del']);
	Route::post('teacher/status', ['uses' => 'Admin\TeachersController@updateStatus', 'as' => 'teachers.status']);
});

	// Categories Routes
	Route::resource('categories', 'Admin\CategoryController');
	Route::get('get-categories-data', ['uses' => 'Admin\CategoryController@getData', 'as' => 'categories.get_data']);

	Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoryController@massDestroy', 'as' => 'categories.mass_destroy']);

	Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoryController@restore', 'as' => 'categories.restore']);
	Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoryController@perma_del', 'as' => 'categories.perma_del']);


	//===== Courses Routes =====//
	Route::resource('courses', 'Admin\CoursesController');
	Route::get('get-courses-data', ['uses' => 'Admin\CoursesController@getData', 'as' => 'courses.get_data']);
	Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
	Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
	Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);
	Route::post('course-save-sequence', ['uses' => 'Admin\CoursesController@saveSequence', 'as' => 'courses.saveSequence']);
	Route::get('course-publish/{id}', ['uses' => 'Admin\CoursesController@publish', 'as' => 'courses.publish']);



