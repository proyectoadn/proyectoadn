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
$id_user=$id[1];
$id_cat=$id[0];
$id_rol=$id[2];

if($conexion->conectar()){
    $conexion->rellenar_tareas($id_cat,$id_rol,$id_user);

   while ($conexion->ir_Siguiente()) {
        $vector[]=[
           'descripcion'=> utf8_encode($conexion->obtener_campo('descripcion')),
           'id'=> $conexion->obtener_campo('id_tarea'),
            'estado' =>  $conexion->obtener_campo('id_estado'),
            'modelo' =>  $conexion->obtener_campo('modelo')
        ];
   }
}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;