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

Route::group(['prefix' => 'admin', 'middleware' => [ 'web', 'auth','roleChecker']], function () {
    Route::get('/dashboard', 'Admin\UserController@dashboard')->name('admin.dashboard');
    Route::get('/users', 'Admin\UserController@index')->name('admin.users');
    Route::resource('/user','Admin\UserController');
    Route::get('/reviews','Admin\ReviewController@index')->name('admin.reviews');
    Route::delete('/review/delete/{review}', 'Admin\ReviewController@destroy')->name('review.destroy');
    Route::get('/videos','Admin\VideoController@index')->name('admin.videos');
    Route::delete('/video/delete/{video}','Admin\VideoController@destroy')->name('video.destroy');
});

Route::group(['prefix' => '{language}', 'middleware' => 'localization'], function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', function () { return view('welcome'); })->name('welcome');
    Route::get('/upload', 'HomeController@upload')->name('video.upload');
    Route::get('video/{id}', 'VideoController@show')->name('video.show');
    Route::post('search', 'VideoController@search')->name('video.search');
    Route::get('video/{video}/edit',  'VideoController@edit')->name('video.edit');
});


Route::post('/video/store', 'VideoController@store')->name('video.store');
Route::post('/review/store/{id}','ReviewController@store')->name('review.store');
Route::put('video/update/{video}',  'VideoController@update')->name('video.update');

