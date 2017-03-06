<?php

/**
 * Ajax que recoge de la base de datos el comentario de los administradores.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';


$conexion = new Conexion();


if ($conexion->conectar()) {
    $conexion->rellenar_comentarioAdmin();
    $conexion->ir_Siguiente();
    $mensaje = utf8_encode($conexion->obtener_campo("mensaje"));

}
$conexion->cerrar_Conexion();
$mensaje = json_encode($mensaje);
echo $mensaje;
