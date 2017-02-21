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
            'id_tarea' => $conexion->obtener_campo('id_tarea'),
            'descripcion' => utf8_encode($conexion->obtener_campo('descripcion'))

        ];
    }
}
$conexion->cerrar_Conexion();

$vector = json_encode($vector);

echo $vector;
