<?php
/**
 * Created by PhpStorm.
 * User: DAW2
 * Date: 31/01/2017
 * Time: 10:42
 */

require_once 'Conexion.php';


$conexion = new Conexion();
$vector=[];
$datos = json_decode($_POST['datos']);

$descripcion=utf8_decode($datos[0]);
$link=utf8_decode($datos[5]);
$tarea=utf8_decode($datos[6]);

//Si solo hay una categoria, unicamente compruebo una posicion en el vector principal
if(count($datos[1])==1){
    $categoria[]=utf8_decode($datos[1]);
}
//Si no, extraigo la informacion dentro del vector principal, en otro vector interno.
else{
    for($i=0;$i<count($datos[1]);$i++){
        $categoria[]=utf8_decode($datos[1][$i]);
    }
}

$rol=$datos[2];
$entrega=$datos[3];
$modelo=$datos[4];

if($conexion->conectar()){
    for($i=0;$i<count($categoria);$i++){
        $conexion->insertar_documento($descripcion,$categoria[$i],$rol,$entrega,$modelo,$link);
        $conexion->sacar_ultimo_doc();
        $conexion->ir_Siguiente();
        $id_documentacion=$conexion->obtener_campo('id_documentacion');
        $conexion->insertar_tarea($id_documentacion,$tarea);
    }

    $aux="ok";
}

$conexion->cerrar_Conexion2();

$vector=  json_encode($aux);
echo $vector;
