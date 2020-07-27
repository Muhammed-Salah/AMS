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

Auth::routes();

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


});
