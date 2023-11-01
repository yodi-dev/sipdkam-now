<?php

use App\Alatmedis;
use App\Jadwal;

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lock', ['as' => 'page.lock', 'uses' => 'PageController@lock']);
Route::get('pricing', ['as' => 'page.pricing', 'uses' => 'PageController@pricing']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/kunjungan/statistik', 'KunjunganController@statistik')->name('statistik.kunjungan');
    Route::resources([
        'rekam' => RekamController::class,
        'kunjungan' => KunjunganController::class,
        'user' => UserController::class,
        'role' => RoleController::class,
        'biaya' => BiayaController::class,
        'obat' => ObatController::class,
        'alatmedis' => AlatmedisController::class,
        'jadwal' => JadwalController::class,
        'utang' => UtangController::class,
    ]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
    Route::get('/kunjungan/biaya/{id}', 'KunjunganController@biaya')->name('biaya.kunjungan');
    Route::get('/kunjungan/Printbiaya/{id}', 'KunjunganController@Printbiaya')->name('Printbiaya.kunjungan');
    Route::post('biaya', 'BiayaController@store')->name('biaya.store');
});
