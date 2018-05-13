<?php
use \App\Http\Middleware\PainelAuth;

/**
 * Rotas Onepage
 */
Route::get('/netbr', "OnepageController@home")->name('netbr');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rotas Painel Administrativo
 */
Route::group([
    'middleware' => 'auth',
    'prefix' => 'painel',
    'except' => [
        'logout',
        'login',
    ],
], function () {
    Route::get('/', function () {
        return 'Dashboard Home View';
    });
});
Route::group([
    'prefix' => 'painel',
], function () {
    Route::get('login', function () {
        return 'Painel Login Form';
    });

    Route::get('logout', function () {
        return 'LogoutActionMethod';
    });
});
