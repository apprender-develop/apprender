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
    if (Auth::user() != null) {
        return redirect()->route('home');
    }
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('graficas', 'DashboardController@index');
});

Route::group(['prefix' => 'sandbox'], function () {
    Route::group(['prefix' => 'jona'], function () {
        Route::get('memorama', 'SandboxController@index');
    });
});
