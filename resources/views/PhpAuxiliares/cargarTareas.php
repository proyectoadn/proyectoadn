<?php
/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';



$conexion = new Conexion();
$vector = [];
$id = json_decode($_POST['id']);
$id_rol = $id[0];

if ($conexion->conectar()) {
    $conexion->rellenar_tareas_admin($id_rol);

    while ($conexion->ir_Siguiente()) {
        $vector[] = [
            'id_documentacion' => $conexion->obtener_campo('id_documentacion'),
            'descripcion' => utf8_encode($conexion->obtener_campo('descripcion')),
            'id_categoria' => $conexion->obtener_campo('id_categoria'),
            'modelo' => $conexion->obtener_campo('modelo'),
            'id_entregar' => $conexion->obtener_campo('id_entregar')
        ];
    }
}
$conexion->cerrar_Conexion();

$vector = json_encode($vector);

echo $vector;
