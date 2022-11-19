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
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lock', ['as' => 'page.lock', 'uses' => 'PageController@lock']);
Route::get('pricing', ['as' => 'page.pricing', 'uses' => 'PageController@pricing']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('item', 'ItemController');
    Route::resource('role', 'RoleController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
