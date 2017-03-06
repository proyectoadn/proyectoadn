<?php
/**
 * Carga la informacion del comentario de una tarea
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';


$conexion = new Conexion();
$vector=[];
$id_tarea = json_decode($_POST['id']);
$mensaje='';
if($conexion->conectar()){
    $conexion->rellenar_comentario($id_tarea);

   while ($conexion->ir_Siguiente()) {
       $mensaje=$conexion->obtener_campo('mensaje');
   }
    $conexion->rellenar_textotarea($id_tarea);

    while ($conexion->ir_Siguiente()) {
        $descripcion=  utf8_encode($conexion->obtener_campo('descripcion'));
    }

        $vector[]=[
           'mensaje'=> $mensaje,
            'descripcion'=>  $descripcion
        ];

}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;
