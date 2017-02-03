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
$consult='Select tarea.id_tarea, tarea.descripcion, tarea.id_estado, documentacion.modelo from documentacion, tarea where documentacion.id_categoria='.$id_cat.' and documentacion.id_rol='.$id_rol.' and documentacion.id_documentacion=tarea.id_documentacion and tarea.id_usuario='.$id_user;

if($conexion->conectar()){
    $conexion->rellenar_Datos($consult);

   while ($conexion->ir_Siguiente()) {
        $vector[]=[
           'descripcion'=> $conexion->obtener_campo('descripcion'),
           'id'=> $conexion->obtener_campo('id_tarea'),
            'estado' =>  $conexion->obtener_campo('id_estado'),
            'modelo' =>  $conexion->obtener_campo('modelo')
        ];
   }
}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;