<?php

/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';


$conexion = new Conexion();


$borrar = json_decode($_POST['datos']);
$tipo = json_decode($_POST['tipo']);



if ($conexion->conectar()) {

    if ($tipo == 'Roles') {

        for ($i = 0; $i < count($borrar); $i++) {

            $conexion->borrarrol($borrar[$i]);
        }
    }
    else if($tipo == 'Categorias'){
        
        for ($i = 0; $i < count($borrar); $i++) {

            $conexion->borrarcategorias($borrar[$i]);
        }
    }
    else if($tipo == 'Entregas'){
        
        
        for ($i = 0; $i < count($borrar); $i++) {

            $conexion->borrarentregas($borrar[$i]);
        }
    }
}


$conexion->cerrar_Conexion2();

echo json_encode('ok');
