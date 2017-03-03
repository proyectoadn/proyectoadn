<?php

/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 22/02/2017
 * Time: 10:26
 */
require_once 'Conexion.php';

$conexion = new Conexion();

//usuarios es un array con los id de usuarios que se han de eliminar
$datos = json_decode($_POST['datos']);

$usuarios = $datos[1];
$idSesion = $datos[0];

if ($conexion->conectar()) {

    for ($i = 0; $i < count($usuarios); $i++) {
        if ($usuarios[$i] != $idSesion) {
            //Si el usuario que se quiere eliminar no es el de la sesion, se elimina
            $conexion->denegar_usuario($usuarios[$i]);
        }
    }

    $conexion->cerrar_Conexion2();

    $vector = json_encode($idSesion);

    echo $vector;
}
