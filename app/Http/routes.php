<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [

    'as' => 'login',
    'uses' => 'Controlador@index'
]);

Route::get('loginerror', [

    'as' => 'loginerror',
    'uses' => 'Controlador@loginerror'
]);

Route::post('validar', [

    'as' => 'validar',
    'uses' => 'Controlador@comprobarlogin',
    'middleware' => 'login'
]);

Route::post('registro', [
    
    'as' => 'registro',
    'uses' => 'Controlador@registro',
]);

Route::post('usuario', [
    
    'as' => 'usuario',
    'uses' => 'Controlador@registro',
]);

Route::post('administrador', [
    
    'as' => 'administrador',
    'uses' => 'Controlador@registro',
]);
