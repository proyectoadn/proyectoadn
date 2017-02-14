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

   while ($conexion->ir_Siguiente()) {
        $vector[]=[
           'descripcion'=> utf8_encode($conexion->obtener_campo('descripcion')),
           'id'=> $conexion->obtener_campo('id_documentacion'),
            'modelo' =>  $conexion->obtener_campo('modelo')
        ];
   }
}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;