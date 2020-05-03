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


Auth::routes();

Route::group(['prefix' => '{language}', 'middleware' => 'localization'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::get('dashboard', 'Admin\UserController@index')->name('admin.dashboard');
    Route::get('users', 'Admin\UserController@listUsers')->name('admin.users');
});
