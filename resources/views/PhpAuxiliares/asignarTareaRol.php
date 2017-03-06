<?php

/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 22/02/2017
 * Time: 10:26
 */
require_once 'Conexion.php';

$conexion = new Conexion();


$ids_roles = json_decode($_POST['roles']);
$ids_tareas = json_decode($_POST['tareas']);

if ($conexion->conectar()) {

    for ($i = 0; $i < count($ids_roles); $i++) {

        //Sacamos el id_usuario en la tabla cargo por el id-rol
        $conexion->obtenerUsuarioCargo($ids_roles[$i]);

        while ($conexion->ir_Siguiente()) {
            $idUsuario[] = $conexion->obtener_campo('id_usuario');
        }


        for ($x = 0; $x < count($ids_tareas); $x++) {

            //Sacamos la informacion de la tarea
            $conexion->sacarTarea($ids_tareas[$x]);
            $conexion->ir_Siguiente();

            //recogemos el campo descripcion e id_docu
            $descripcion = $conexion->obtener_campo('descripcion');
            $id_documentacion = $conexion->obtener_campo('id_documentacion');
            
            if(count($idUsuario)==0){
                $conexion->asignarTareasUsuario($id_documentacion, NULL, $descripcion);
            }else{
                $conexion->asignarTareasUsuario($id_documentacion, $idUsuario[$i], $descripcion);
            }


        }
    }
    echo json_encode($idUsuario);
}






//if ($conexion->conectar()) {
//
//    for ($i = 0; $i < count($ids_roles); $i++) {
//        
//        //Sacamos la informacion de la tarea
//        $conexion->sacarTarea($ids_tareas[$i]);
//        $conexion->ir_Siguiente();
//
//        //recogemos el campo descripcion e id_docu
//        $descripcion = $conexion->obtener_campo('descripcion');
//        $id_documentacion = $conexion->obtener_campo('id_documentacion');
//
//        //select rellenando el cursor con  la tarea con id_usu y descripcion especificados
//        $conexion->verificarInsertTareas($id_usuario, $descripcion);
//
//        //Siguiente en el cursor 2
//        $tarea = $conexion->ir_Siguiente2();
//
//        //Si la consulta no devuelve nada, es null, es que no existe, hace el insert.
//        if ($tarea == null) {
//
//            $conexion->asignarTareasUsuario($id_documentacion, $id_usuario, $descripcion);
//        }
//    }
//}
//$conexion->cerrar_Conexion();
