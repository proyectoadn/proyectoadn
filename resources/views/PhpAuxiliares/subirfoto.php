<?php


$file = json_decode($_POST['datos']);

$rutadestino = public_path().'Imagenes'.'1';
$url_image = $file->getClientOriginalName();
$subir = $file->move($rutadestino, $file->getClientOriginalName());






