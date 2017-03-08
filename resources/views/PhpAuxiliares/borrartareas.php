<?php
/**
 * Ajax que borra unas tareas a traves de sus IDs.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';



$conexion = new Conexion();
$ids = json_decode($_POST['datos']);


if ($conexion->conectar()) {

    for ($i = 0; $i < count($ids); $i++) {
            //Si el usuario que se quiere eliminar no es el de la sesion, se elimina
            $conexion->borrar_tarea($ids[$i]);
        $aux='ok';
    }
}

    $conexion->cerrar_Conexion2();
$vector=  json_encode($aux);
echo $vector;