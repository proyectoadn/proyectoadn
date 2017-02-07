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
$id_tarea = json_decode($_POST['id']);

if($conexion->conectar()){
    $conexion->rellenar_comentario($id_tarea);

   while ($conexion->ir_Siguiente()) {
        $vector[]=[
           'mensaje'=> $conexion->obtener_campo('mensaje'),
        ];
   }
}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;
