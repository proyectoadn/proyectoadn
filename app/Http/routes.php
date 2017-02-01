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


//Rutas get

Route::get('login', [

    'as' => 'login',
    'uses' => 'Controlador@index'
]);

Route::get('loginerror', [

    'as' => 'loginerror',
    'uses' => 'Controlador@loginerror'
]);


Route::get('gestionTareas', [

    'as' => 'loginerror',
    'uses' => 'Controlador@gestiontareas'
]);




//Rutas post

Route::post('validar', [

    'as' => 'validar',
    'uses' => 'Controlador@comprobarlogin',
    'middleware' => 'login'
]);

//POST del formulario de registro
Route::post('registrar', [
    'as' => 'registrar',
    'uses' => 'Controlador@registrar',
    'middleware' => 'registrar'
]);

Route::post('registro', [

    'as' => 'registro',
    'uses' => 'Controlador@registro',
]);

Route::post('usuario', [

    'as' => 'usuario',
    'uses' => 'Controlador@usuario',
]);

Route::post('administrador', [

    'as' => 'administrador',
    'uses' => 'Controlador@administrador',
]);

Route::post('registrar', [

    'as' => 'registrar',
    'uses' => 'Controlador@registrar',
]);
