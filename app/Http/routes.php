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

Route::get('subirimagen', [
    'as' => 'subirimagen',
    'uses' => 'Controlador@subirimagen',
]);

Route::get('registro', [
    'as' => 'registro',
    'uses' => 'Controlador@registro',
]);

Route::get('subirfotoerror', [
    'as' => 'subirfotoerror',
    'uses' => 'Controlador@loginconfirm'
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

Route::post('subirimagen', [
    'as' => 'subirimagen',
    'uses' => 'Controlador@subirimagen',
]);



Route::group(['middleware' => 'admin'],function(){

    //Rutas post


    Route::post('administrador', [
        'as' => 'administrador',
        'uses' => 'Controlador@administrador',
    ]);


    Route::post('enviarconfirm', [
        'as' => 'enviarconfirm',
        'uses' => 'Controlador@enviarconfirm'
    ]);

    Route::post('enviarconfirm', [
        'as' => 'enviarconfirm',
        'uses' => 'Controlador@enviarconfirm'
    ]);

    Route::post('datoscentro', [
        'as' => 'datoscentro',
        'uses' => 'Controlador@datoscentro'
    ]);

    Route::post('actualizarDatosCentro', [
        'as' => 'actualizarDatosCentro',
        'uses' => 'Controlador@actualizarDatosCentro'
    ]);

    Route::post('nuevorol', [
        'as' => 'nuevorol',
        'uses' => 'Controlador@nuevorol',
    ]);

    Route::post('nuevacategoria', [
        'as' => 'nuevacategoria',
        'uses' => 'Controlador@nuevacategoria',
    ]);

    Route::post('nuevaentrega', [
        'as' => 'nuevaentrega',
        'uses' => 'Controlador@nuevaentrega',
    ]);

    Route::post('pdf', [
        'as' => 'pdf',
        'uses' => 'Controladorpdf@pdf',
    ]);

    Route::post('guardarLog', [
        'as' => 'guardarLog',
        'uses' => 'Controlador@guardarLog',
    ]);

    Route::post('verHistorico', [
        'as' => 'verHistorico',
        'uses' => 'Controlador@verHistorico',
    ]);
    Route::post('editargestion', [

        'as' => 'editargestion',
        'uses' => 'Controlador@gestion'
    ]);



    //Rutas get

    Route::get('gestionTareas', [
        'as' => 'loginerror',
        'uses' => 'Controlador@gestiontareas'
    ]);

    Route::get('validar', [
        'as' => 'elegirRol',
        'uses' => 'Controlador@elegirRol'
    ]);

    Route::get('datoscentro', [
        'as' => 'datoscentro',
        'uses' => 'Controlador@datoscentro'
    ]);


    Route::get('administrarUsuarios', [
        'as' => 'administrarUsuarios',
        'uses' => 'Controlador@administrarUsuarios',
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

    Route::get('activar', [
        'as' => 'activar',
        'uses' => 'Controlador@activar',
    ]);

    Route::get('gestion', [
        'as' => 'gestion',
        'uses' => 'Controlador@gestion',
    ]);

    Route::get('verLog', [
        'as' => 'verLog',
        'uses' => 'Controlador@verLog',
    ]);
});



Route::group(['middleware' => 'user'],function(){

    //Rutas post

    Route::post('datoscentro', [
        'as' => 'datosCentroVisualizar',
        'uses' => 'Controlador@datosCentroVisualizar'

    ]);

    Route::post('usuario', [
        'as' => 'usuario',
        'uses' => 'Controlador@usuario',
    ]);


    //Rutas get
    Route::get('datoscentro', [
        'as' => 'datosCentroVisualizar',
        'uses' => 'Controlador@datosCentroVisualizar'
    ]);

    Route::get('usuario', [
        'as' => 'usuario',
        'uses' => 'Controlador@usuario',
    ]);

    Route::get('validar', [
        'as' => 'usuario',
        'uses' => 'Controlador@usuario'
    ]);

});
