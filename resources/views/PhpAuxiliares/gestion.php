<?php

/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';


$conexion = new Conexion();


$id = json_decode($_POST['id']);
$nombretabla = json_decode($_POST['nombretabla']);


if ($conexion->conectar()) {


    if ($nombretabla == 'rol') {

        $conexion->rellenar_gestionrol($id);

        $conexion->ir_Siguiente();
        $descripcion = $conexion->obtener_campo('descripcion');

        echo json_encode($descripcion);
    } 
    else if ($nombretabla == 'categorias') {

        $conexion->rellenar_gestioncategorias($id);

        $conexion->ir_Siguiente();
        $descripcion = $conexion->obtener_campo('descripcion');

        echo json_encode($descripcion);
    }
    else if($nombretabla == 'entregas'){
        
        $conexion->rellenar_gestionentregas($id);

        $conexion->ir_Siguiente();
        $descripcion = $conexion->obtener_campo('descripcion');

        echo json_encode($descripcion);
    }
}

$conexion->cerrar_Conexion2();
