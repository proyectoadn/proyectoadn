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
    return view('Login/login');
});


//Rutas get

Route::any('login', [

    'as' => 'login',
    'uses' => 'Controlador@index'
]);

Route::get('loginerror', [

    'as' => 'loginerror',
    'uses' => 'Controlador@loginerror'
]);

Route::get('loginconfirm', [

    'as' => 'loginconfirm',
    'uses' => 'Controlador@loginconfirm'
]);

Route::get('gestionTareas', [

    'as' => 'loginerror',
    'uses' => 'Controlador@gestiontareas'
]);

Route::get('registroerror', [

    'as' => 'registroerror',
    'uses' => 'Controlador@registroerror'
]);

Route::get('enviarpassword', [

    'as' => 'enviarpassword',
    'uses' => 'Controlador@enviarpassword'
]);

Route::get('enviarcorreo', [

    'as' => 'enviarcorreo',
    'uses' => 'Controlador@enviarcorreo'
]);

Route::get('restablecerpassword', [

    'as' => 'restablecerpassword',
    'uses' => 'Controlador@restablecerpassword'
]);

Route::get('usuario', [

    'as' => 'usuario',
    'uses' => 'Controlador@usuario',
]);

Route::get('administrador', [
    'as' => 'administrador',
    'uses' => 'Controlador@administrador',
]);

Route::get('asignarTareas', [
    'as' => 'asignarTareas',
    'uses' => 'Controlador@asignarTareas',
]);

Route::get('activarUsuarios', [
    'as' => 'activarUsuarios',
    'uses' => 'Controlador@activarUsuarios',
]);

Route::get('administrar', [
    'as' => 'administrar',
    'uses' => 'Controlador@administrador',
]);






//Rutas post

Route::post('validar', [

    'as' => 'validar',
    'uses' => 'Controlador@comprobarlogin',
    'middleware' => 'login'
]);


Route::post('registrar', [

    'as' => 'registrar',
    'uses' => 'Controlador@registrar',
    'middleware' => 'registro'
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

Route::post('enviarcorreo', [

    'as' => 'enviarcorreo',
    'uses' => 'Controlador@enviarcorreo'
]);

Route::post('restablecer', [

    'as' => 'restablecer',
    'uses' => 'Controlador@restablecer'
]);

Route::post('cerrarsesion', [

    'as' => 'cerrarsesion',
    'uses' => 'Controlador@cerrarsesion'
]);

Route::post('miperfil', [

    'as' => 'miperfil',
    'uses' => 'Controlador@miperfil'
]);

Route::post('actualizarperfil', [

    'as' => 'actualizarperfil',
    'uses' => 'Controlador@actualizarperfil'
]);

Route::post('passwordperfil', [
    'as' => 'passwordperfil',
    'uses' => 'Controlador@passwordperfil',
]);

Route::post('cambiarpasswordperfil', [
    'as' => 'cambiarpasswordperfil',
    'uses' => 'Controlador@cambiarpasswordperfil',
]);
