<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {

  /*
  |--------------------------------------------------------------------------
  | Authentication Routes
  |--------------------------------------------------------------------------
  */
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');

  /*
  |--------------------------------------------------------------------------
  | Password Reset Routes
  |--------------------------------------------------------------------------
  */
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});

Route::group(['middleware' => 'auth'], function() {

  /*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  */
  Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:hr,admin'], function() {

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::post('employee/get-designation', 'EmployeeController@getDesignation')->name('get-designation');
    Route::resource('employee', 'EmployeeController', ['except' => ['show']]);
    Route::resource('department', 'DepartmentController', ['except' => ['create', 'show', 'edit']]);
    Route::resource('designation', 'DesignationController', ['except' => ['create', 'show', 'edit']]);

    // Route::resource('leave-type', 'LeaveTypeController', ['except' => [
    //   'create', 'show', 'edit'
    // ]]);

    Route::resource('leave', 'LeaveController', ['except' => ['show']]);
    Route::resource('announcement', 'AnnouncementController');
    Route::get('timelog/get', 'TimelogController@getTimelog')->name('timelog.get');
    Route::resource('timelog', 'TimelogController');
    Route::resource('overtime', 'OvertimeController');

  });

  /*
  |--------------------------------------------------------------------------
  | Employee Routes
  |--------------------------------------------------------------------------
  */
  Route::group(['middleware' => 'role:employee'], function() {

    Route::get('/', 'Employee\EmployeeController@index')->name('dashboard');
    Route::resource('leave', 'Employee\LeaveController', ['except' => ['show', 'edit', 'destroy']]);
    Route::get('announcement', 'Employee\AnnouncementController@index')->name('announcement');
    Route::get('timesheet/get', 'Employee\TimesheetController@getTimelog')->name('timesheet.get');
    Route::resource('timesheet', 'Employee\TimesheetController');

  });

  Route::group(['middleware' => 'role:employee,hr'], function() {
    Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
  });

});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');