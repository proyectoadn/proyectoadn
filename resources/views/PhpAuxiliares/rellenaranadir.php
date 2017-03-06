<?php
/** Carga la informacion necesaria para el popup de añadir documentacion
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
if($conexion->conectar()){

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
            'categorias'=>  $categorias,
            'rol'=>$roles,
            'entregar'=>$entregar
        ];

}
$conexion->cerrar_Conexion();

$vector=  json_encode($vector);
echo $vector;
