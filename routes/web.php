<?php

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lock', ['as' => 'page.lock', 'uses' => 'PageController@lock']);
Route::get('pricing', ['as' => 'page.pricing', 'uses' => 'PageController@pricing']);


Route::group(['middleware' => 'auth'], function () {
    Route::resource('rekam', 'RekamController');
    Route::resource('kunjungan', 'KunjunganController');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('biaya', 'BiayaController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
    Route::get('/kunjungan/biaya/{id}', 'KunjunganController@biaya')->name('biaya.kunjungan');
    Route::get('/kunjungan/Printbiaya/{id}', 'KunjunganController@Printbiaya')->name('Printbiaya.kunjungan');
    Route::post('biaya', 'BiayaController@store')->name('biaya.store');
});
