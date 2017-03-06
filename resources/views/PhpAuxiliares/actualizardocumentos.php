<?php
/**
 * Ajax que actualiza los datos de una documentación.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';


$conexion = new Conexion();
$vector=[];
$datos = json_decode($_POST['datos']);
$descripcion=utf8_decode($datos[0]);
$categoria=$datos[1];
$rol=$datos[2];
$entrega=$datos[3];
$modelo=$datos[4];
$id_doc=$datos[5];
$link=utf8_decode($datos[6]);
$tarea=utf8_decode($datos[7]);

if($conexion->conectar()){
    $conexion->update_documento($descripcion,$categoria,$rol,$entrega,$modelo,$id_doc,$link);
    $conexion->update_tarea($tarea,$id_doc);
    $aux="ok";
}
$conexion->cerrar_Conexion2();

$vector=  json_encode($aux);
echo $vector;
