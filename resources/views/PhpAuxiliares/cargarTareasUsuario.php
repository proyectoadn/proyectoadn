<?php
/**
 * Carga todas las tareas de la base de datos dependiendo del id del rol que se le pase.
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
$id_usu= $id[1];

if ($conexion->conectar()) {
    $conexion->rellenar_tareas_usu($id_rol,$id_usu);

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
