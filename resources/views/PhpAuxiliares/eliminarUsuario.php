<?php

/**
 * Ajax para borrar un usuario basandose en su ID
 * Created by PhpStorm.
 * User: DAW2
 * Date: 22/02/2017
 * Time: 10:26
 */


require_once 'Conexion.php';
//require_once 'Fichero.php';


$conexion = new Conexion();
//$log = new Fichero();


$id_usuario = $_POST['datos'];

if ($conexion->conectar()) {

    $conexion->denegar_usuario($id_usuario);

    $conexion->cerrar_Conexion();

    
    //$conexion->cargarUsuarioPorID($id_usuario);

    //$nombre = $conexion->obtener_campo('nombre');
    //$apellidos = $conexion->obtener_campo('apellidos');

    //$log->EscribirLog($nombre . ' ' . $apellidos . ' ha sido eliminado.');
    
    echo $actualizado;
}

