<?php
/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';



$conexion = new Conexion();
$vector=[];
$id = json_decode($_POST['id']);
$id_doc=$id[0];


if($conexion->conectar()){
    $conexion->borrar_documentacion($id_doc);
    $aux="ok";

}
$conexion->cerrar_Conexion();

$vector=  json_encode($aux);
echo $vector;