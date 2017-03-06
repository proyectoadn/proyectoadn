<?php
/**
 * Carga la informacion de la documentacion por su id de categoria y su rol.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';



$conexion = new Conexion();
$vector=[];
$id = json_decode($_POST['id']);
$id_cat=$id[0];
$id_rol=$id[1];

if($conexion->conectar()){
    $conexion->rellenar_documentacion($id_cat,$id_rol);

   while ($conexion->ir_Siguiente()) {
       $desc=utf8_encode($conexion->obtener_campo('descripcion'));
       $link=utf8_encode($conexion->obtener_campo('link'));
        $vector[]=[
           'descripcion'=> $desc,
           'id'=> $conexion->obtener_campo('id_documentacion'),
            'modelo' =>  $conexion->obtener_campo('modelo'),
            'link' =>  $link
        ];
   }
}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;