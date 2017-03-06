<?php

/**
 * Ajax que borra un usuario de la base de datos por su ID.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 22/02/2017
 * Time: 10:26
 */
require_once 'Conexion.php';


$conexion = new Conexion();

$id_usuario = $_POST['id'];

if ($conexion->conectar()) {

    $conexion->denegar_usuario($id_usuario);
    
    $conexion->cerrar_Conexion();
    
    echo $actualizado;
}
