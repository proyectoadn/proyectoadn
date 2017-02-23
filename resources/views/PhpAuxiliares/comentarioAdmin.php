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
$datos = json_decode($_POST['datos']);
$mensaje = utf8_decode($datos);


if ($conexion->conectar()) {
    $conexion->update_comentarioAdmin($mensaje);
    
    $aux='ok';
}
$conexion->cerrar_Conexion2();


$aux = json_encode($aux);
echo $vector;