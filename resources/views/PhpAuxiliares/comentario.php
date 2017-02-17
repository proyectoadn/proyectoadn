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
$coment = json_decode($_POST['coment']);
$text=utf8_decode($coment[0]);
$id_tarea=$coment[1];

if($conexion->conectar()){
    $conexion->insert_comentario($text,$id_tarea);
    $aux="ok";
}
$conexion->cerrar_Conexion2();

$vector=  json_encode($aux);
echo $vector;
