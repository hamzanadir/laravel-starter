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
})->name('front.index');

Auth::routes();
Route::get('register/verify/{token}','Auth\RegisterController@verify')->name('verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::name('profile.show')->get('/profile','UserController@showProfile');
Route::name('profile.update')->post('/profile','UserController@updateProfile');
Route::name('mail.update')->post('/mail','UserController@updateMail');
Route::name('password.update')->post('/password','UserController@updatePassword');
Route::name('avatar.update')->post('/avatar','UserController@updateAvatar');
