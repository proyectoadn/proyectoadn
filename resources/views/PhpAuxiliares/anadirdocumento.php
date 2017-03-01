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
$datos = json_decode($_POST['datos']);

$descripcion=utf8_decode($datos[0]);
$link=utf8_decode($datos[5]);


if(count($datos[1])==1){
    $categoria[]=$datos[1];
}
else{
    for($i=0;$i<count($datos[1]);$i++){
        $categoria[]=$datos[1][$i];
    }
}

$rol=$datos[2];
$entrega=$datos[3];
$modelo=$datos[4];

if($conexion->conectar()){
    for($i=0;$i<count($categoria);$i++){
        $conexion->insertar_documento($descripcion,$categoria[$i],$rol,$entrega,$modelo,$link);
    }

    $aux="ok";
}

$conexion->cerrar_Conexion2();

$vector=  json_encode($aux);
echo $vector;
