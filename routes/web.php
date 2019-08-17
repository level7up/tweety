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

Route::resource('tweets','TweetsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@image');

Route::get('/{id}', 'ProfileController@show');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/{id}/following', 'ProfileController@following')->name('following');;
    Route::get('/follows/{id}', 'UserController@follows');
    Route::get('/unfollows/{id}', 'UserController@unfollows');
});
Route::get('/{id}', 'ProfileController@show');
Route::get('/{id}/followers', 'ProfileController@followers')->name('followers');;
