<?php
/**
 * Ajax que borra una documentacion a traves de un ID, ademas tambien borra las tareas que tengan esa documentacion.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';



$conexion = new Conexion();
$id = json_decode($_POST['id']);



if($conexion->conectar()){
    $conexion->borrar_documentacion($id);
    $aux="ok";

}
$conexion->cerrar_Conexion2();

$vector=  json_encode($aux);
echo $vector;