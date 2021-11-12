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





Route::get('/', function () {
    return view('welcome');
});
 
Route::get('admin/home', 'HomeController@index')->name('home');
  

Route::post('admin/notify', 'NotificationController@notify');
  



Route::prefix('/course')->group(function(){
    Route::post('/store', 'CourseController@store')->name('course');
});


Route::prefix('/admin')->group(function(){
    Route::get('/student/seach/', 'StudentController@search')->name('student-search');
    Route::get('/instructor/seach/', 'InstructorController@search')->name('instructor-search');
    Route::get('/staff/seach/', 'StaffController@search')->name('staff-search');
});
   


Route::prefix('admin')->group(function () {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('schedule', 'ScheduleController');
    Route::resource('notification', 'NotificationController');
    Route::resource('student', 'StudentController');
    Route::resource('instructor', 'InstructorController');
    Route::resource('fleet', 'FleetController'); 
    Route::resource('branch', 'BranchController');
    Route::resource('invoice', 'InvoiceController');
    Route::resource('communication', 'UsermessageController');
    Route::resource('staff', 'StaffController');
    Route::resource('course', 'CourseController');
    Route::resource('school', 'SchoolController');
    Route::resource('settings', 'SettingController'); 
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');