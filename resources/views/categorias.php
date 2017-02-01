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
$rol = json_decode($_POST['rol']);
$consult='Select DISTINCT categoria.id_categoria, categoria.descripcion from documentacion,categoria where documentacion.id_rol='.$rol.' and documentacion.id_categoria=categoria.id_categoria';

if($conexion->conectar()){
    $conexion->rellenar_Datos($consult);

   while ($conexion->ir_Siguiente()) {
        $vector[]=[
           'descripcion'=> $conexion->obtener_campo('descripcion'),
           'id'=> $conexion->obtener_campo('id_categoria')
        ];
   }
}

$vector=  json_encode($vector);
echo $vector;
