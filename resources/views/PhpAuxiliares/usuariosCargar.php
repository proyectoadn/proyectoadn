<?php

/**
 *
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */
require_once 'Conexion.php';



$conexion = new Conexion();
$vector = [];


if ($conexion->conectar()) {
    $conexion->cargarUsuarios();

    while ($conexion->ir_Siguiente()) {
        $vector[] = [
            'nombre' => utf8_encode($conexion->obtener_campo('nombre')),
            'apellidos' => utf8_encode($conexion->obtener_campo('apellidos')),
            'email' => utf8_encode($conexion->obtener_campo('email')),
            'id_usuario' => utf8_encode($conexion->obtener_campo('id_usuario'))
            
        ];
    }
}
$conexion->cerrar_Conexion();

$vector = json_encode($vector);
echo $vector;
