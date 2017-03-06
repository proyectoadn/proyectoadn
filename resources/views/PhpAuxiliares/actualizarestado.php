<?php

/**
 * Ajax que actualiza el estado de la tarea segun lo mueve de una columna a otra
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';


$conexion = new Conexion();

$id_tarea = json_decode($_POST['id']);
$estado = json_decode($_POST['estadoactual']);



if ($conexion->conectar()) {
    
    $conexion->rellenar_estado($estado);
    $conexion->ir_Siguiente();
    $idestado = $conexion->obtener_campo('id_estado');
    
    
    $actualizado = $conexion->actualizar_estado($idestado,$id_tarea);
    
    $conexion->cerrar_Conexion();
    
    echo $actualizado;
}
