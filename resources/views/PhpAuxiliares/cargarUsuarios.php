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
    $conexion->rellenar_usuarios($id_rol);

    while ($conexion->ir_Siguiente()) {
        $vector[] = [
            'nombre' => utf8_encode($conexion->obtener_campo('nombre')),
            'apellidos' => utf8_encode($conexion->obtener_campo('apellidos')),
            'id_usuario' => utf8_encode($conexion->obtener_campo('id_usuario'))
            
        ];
    }
}
//$conexion->cerrar_Conexion();

$vector = json_encode($vector);
echo $vector;
