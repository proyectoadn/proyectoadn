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
$vector = [];
$id_usu = json_decode($_POST['datos']);

if ($conexion->conectar()) {
    $conexion->editarUsuario($id_usu);

    while ($conexion->ir_Siguiente()) {
        $datosusu[] = [
            'descripcion' => utf8_encode($conexion->obtener_campo('descripcion')),
            'id_usuario' => utf8_encode($conexion->obtener_campo('id_usuario')),
            'nombre' => utf8_encode($conexion->obtener_campo('nombre')),
            'apellidos' => utf8_encode($conexion->obtener_campo('apellidos')),
            'email' => utf8_encode($conexion->obtener_campo('email'))
        ];
    }
    $conexion->rellenar_roles();
    
     while ($conexion->ir_Siguiente()) {
        $roles[] = [
            'descripcion' => utf8_encode($conexion->obtener_campo('descripcion')),
            'id_rol'=>$conexion->obtener_campo('id_rol')
        ];
    }
    
}
$conexion->cerrar_Conexion();

$vector[] = $datosusu;
$vector[] = $roles;

$vector = json_encode($vector);
echo $vector;
