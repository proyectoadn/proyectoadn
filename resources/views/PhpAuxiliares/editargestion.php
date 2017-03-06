<?php

/**
 * Ajax que edita un rol, una categoria o un a quien entregar.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';


$conexion = new Conexion();


$id = json_decode($_POST['id']);
$descripcion = json_decode($_POST['descripcion']);
$nombretabla = json_decode($_POST['nombretabla']);


if ($conexion->conectar()) {
    
    if($nombretabla == 'rol'){
        
        $conexion->actualizargestionrol($id, $descripcion);
    }
    else if($nombretabla == 'categorias'){
        
        $conexion->actualizargestioncategorias($id, $descripcion);
    }
    else if($nombretabla == 'entregas'){
        
        $conexion->actualizargestionentregar($id, $descripcion);
    }
    
}

$conexion->cerrar_Conexion2();
