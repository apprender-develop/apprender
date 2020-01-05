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

/**
 * Login Route(s)
 */
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\CustomController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Register Route(s)
 */
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
/**
 * Password Reset Route(S)
 */
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
/**
 * Email Verification Route(s)
 */
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::post('/user/password-change', 'Auth\CustomController@changePassword')->middleware('auth')->name('user.changePassword');

Route::get('/', 'GeneralController@welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/curso/{curso_id}/', 'CursosController@show')->middleware('auth')->name('curso');
Route::get('/curso/{curso_id}/unidad/{unidad_id}/tema/{tema}', 'CursosController@unidad')->middleware('auth')->name('curso.unidad');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('graficas', 'DashboardController@index')
        ->name('dashboard.graficas')
        ->middleware('role_or_permission:super-administrador|administrador|dashboard-index');
});

Route::group(['prefix' => 'sandbox'], function () {
    Route::group(['prefix' => 'jona'], function () {
        Route::get('memorama', 'SandboxController@index');
    });
});

Route::post('/calificar', 'CalificarController@calificar')->middleware('auth')->name('calificar');
Route::post('/encuesta', 'EncuestaController@guardar')->middleware('auth')->name('encuesta');

Route::get('/test/useragent', 'SandboxController@useragent');

Route::get('/iframe/vestir', 'GeneralController@vestir');


Route::get('test/dashboard', function(){
    return view('sandbox.dashboard');
});
