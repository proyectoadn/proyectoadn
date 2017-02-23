<?php

/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';


$conexion = new Conexion();
$vector = [];

if ($conexion->conectar()) {
    $conexion->rellenar_comentarioAdmin();
    $conexion->ir_Siguiente();
    $mensaje = utf8_encode($conexion->obtener_campo("mensaje"));


//    $vector[] = [
//        'comentario' => utf8_encode($conexion->obtener_campo('comentario'))
//    ];  
}
$conexion->cerrar_Conexion();
$mensaje = json_encode($mensaje);
//$vector = json_encode($vector);
echo $mensaje;
