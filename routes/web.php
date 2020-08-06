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
});
