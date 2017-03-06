<?php
/**
 * Carga la informacion de la documentacion para el popup
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';


$conexion = new Conexion();
$vector=[];
$roles=[];
$fila;
$descrip_tarea='';
$id_docu = json_decode($_POST['id']);
if($conexion->conectar()){
    $conexion->rellenar_documento($id_docu);

   while ($fila=$conexion->ir_Siguiente()) {
       $documento[]=$fila;
       $nombre=$conexion->obtener_campo('descripcion');
       $link=$conexion->obtener_campo('link');
       $id_entrega=$conexion->obtener_campo('id_entregar');
       $id_categoria=$conexion->obtener_campo('id_categoria');
       $id_rol=$conexion->obtener_campo('id_rol');
       $modelo=$conexion->obtener_campo('modelo');

   }

    $conexion->rellenar_descrip_tarea($id_docu);

    while ($conexion->ir_Siguiente()) {
        $descrip_tarea= $conexion->obtener_campo('descripcion');
    }


    $conexion->rellenar_todas_categorias();

    while ($fila=$conexion->ir_Siguiente()) {
        $categorias[]=  $fila;
    }

    $conexion->rellenar_roles();

    while ($fila=$conexion->ir_Siguiente()) {
        $roles[]=  $fila;
    }

    $conexion->rellenar_entregar();

    while ($fila=$conexion->ir_Siguiente()) {
        $entregar[]=  $fila;
    }

        $vector[]=[
            'id_rol'=>$id_rol,
            'id_entrega'=>$id_entrega,
            'id_categoria'=>$id_categoria,
            'modelo'=>$modelo,
            'nombre'=> utf8_encode($nombre),
            'link'=> utf8_encode($link),
            'categorias'=>  $categorias,
            'rol'=>$roles,
            'entregar'=>$entregar,
            'descrip_tarea'=>utf8_encode($descrip_tarea)
        ];

}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;
