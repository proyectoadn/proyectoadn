<?php
/**
 * Carga las categorias que tiene el rol seleccionado.
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';


$conexion = new Conexion();
$vector=[];
$rol = json_decode($_POST['rol']);

if($conexion->conectar()){
    $conexion->rellenar_categorias($rol);

   while ($conexion->ir_Siguiente()) {
        $vector[]=[
           'descripcion'=> utf8_encode($conexion->obtener_campo('descripcion')),
           'id'=> $conexion->obtener_campo('id_categoria')
        ];
   }
}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;
