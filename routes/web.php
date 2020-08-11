<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
Route::post('user/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    //Dashboard route
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    //Login routes
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

    //Logout route
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //Register routes
    Route::get('/register','Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register','Auth\AdminRegisterController@register')->name('admin.register.submit');

    //Password reset routes
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','Auth\AdminForgotPasswordController@SendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');

    //Edit faculty
    Route::get('/update/{id}', 'AdminController@FacultyUpdate')->name('faculty.update');
    Route::post('/edit/{id}', 'AdminController@FacultyEdit')->name('faculty.edit');
    Route::post('/delete/{id}', 'AdminController@FacultyDelete')->name('faculty.delete');

    //Change password
    Route::get('/change/password', 'Auth\AdminChangePasswordController@index')->name('admin.password.change');
    Route::post('/change/password', 'Auth\AdminChangePasswordController@store')->name('admin.password.edit');
});

Route::prefix('faculty')->group(function () {
    //Dashboard route
    Route::get('/', 'FacultyController@index')->name('faculty.dashboard');

    //Login routes
    Route::get('/login','Auth\FacultyLoginController@showLoginForm')->name('faculty.login');
    Route::post('/login','Auth\FacultyLoginController@login')->name('faculty.login.submit');

    //Logout route
    Route::post('/logout','Auth\FacultyLoginController@logout')->name('faculty.logout');

    //Register routes
    Route::get('/register','Auth\FacultyRegisterController@showRegisterForm')->name('faculty.register');
    Route::post('/register','Auth\FacultyRegisterController@register')->name('faculty.register.submit');

    //Password reset routes
    Route::get('/password/reset','Auth\FacultyForgotPasswordController@showLinkRequestForm')->name('faculty.password.request');
    Route::post('/password/email','Auth\FacultyForgotPasswordController@SendResetLinkEmail')->name('faculty.password.email');
    Route::get('/password/reset/{token}','Auth\FacultyResetPasswordController@showResetForm')->name('faculty.password.reset');
    Route::post('/password/reset','Auth\FacultyResetPasswordController@reset')->name('faculty.password.update');

    //Edit faculty
    Route::get('/update/{id}', 'FacultyController@StudentUpdate')->name('student.update');
    Route::post('/edit/{id}', 'FacultyController@StudentEdit')->name('student.edit');
    Route::post('/delete/{id}', 'FacultyController@StudentDelete')->name('student.delete');
});


//// adminController for student
//Route::get('/student', 'facultyController@students')->name('faculty.students');
//Route::get('/student/add', 'facultyController@studentAdd')->name('faculty.student.add');
//Route::post('/student/add', 'facultyController@studentAdded')->name('faculty.student.add');
//Route::get('/student/details/{id}', 'facultyController@studentDetails')->name('faculty.student.details');
//Route::get('/student/edit/{id}', 'facultyController@studentEdit')->name('faculty.student.edit');
//Route::post('/student/update/{id}', 'facultyController@studentUpdate')->name('faculty.student.update');
//Route::delete('/student/delete/{id}', 'facultyController@studentDelete')->name('faculty.student.delete');
//
//Route::get('/student/cal', 'facultyController@studentCal')->name('faculty.student.cal');
