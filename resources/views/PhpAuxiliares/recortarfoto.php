<?php


$datos = json_decode($_POST['datos']);
$vectordatos = json_decode($_POST['vectordatos']);



$targ_w = $targ_h = 150;
$jpeg_quality = 90;
$output_filename = '../../../public/Imagenes/Fotosusuarios/'.$vectordatos[0].'/'.'fotorecortada.jpg';

$src = '../../../public/Imagenes/Fotosusuarios/'.$vectordatos[0].'/'.$vectordatos[1];
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

imagecopyresampled($dst_r,$img_r,0,0,$datos[0],$datos[1],
$targ_w,$targ_h,$datos[2],$datos[3]);

imagejpeg($dst_r, $output_filename, $jpeg_quality);

echo 'Recortada correctamente';
