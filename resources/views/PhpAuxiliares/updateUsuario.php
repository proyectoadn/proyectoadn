<?php

/**
 * Actualiza la informacion de la base de datos sobre el usuario.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';



$conexion = new Conexion();
$vector = [];
$datos = json_decode($_POST['datos']);

$nomUsuario=utf8_decode($datos[0]);
$apeUsuario=utf8_decode($datos[1]);
$emaUsuario=utf8_decode($datos[2]);
$id_usu=$datos[3];
$roles=[];

//Si solo hay 1 rol, no es un vector, solo meto una variable 
if(count($datos[4])==1){
    $roles[]=utf8_decode($datos[4]);
}
else{
    //Sino se extrae la informacion dentro de un vector con un for en un vector
    for($i=0;$i<count($datos[4]);$i++){
        $roles[]=utf8_decode($datos[4][$i]);
    }
}

if ($conexion->conectar()) {
    $conexion->updateUsuario($nomUsuario, $apeUsuario, $emaUsuario, $id_usu);
    $conexion->borrarCargosUsuario($id_usu);
    for($x=0;$x<count($roles);$x++) {
        $conexion->actualizarCargos($id_usu,$roles[$x]);
        }
}

$conexion->cerrar_Conexion2();

$vector = json_encode($vector);
echo $vector;
