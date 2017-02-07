<?php

/**
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

    $consult = "select * from estado where descripcion='" . $estado . "'";
    

    
    $id_estado = $conexion->rellenar_estado($consult);
    $conexion->ir_Siguiente();
    $idestado = $conexion->obtener_campo('id_estado');
    
    
    $consult = 'update tarea set id_estado = '.$idestado.' where id_tarea = '.$id_tarea;
    $actualizado = $conexion->actualizar_estado($consult);
    
    $conexion->cerrar_Conexion();
    
    echo $actualizado;
}
