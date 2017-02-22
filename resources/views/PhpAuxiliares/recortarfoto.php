<?php


$datos = json_decode($_POST['cordenadas']);



$targ_w = $targ_h = 150;
$jpeg_quality = 90;
$output_filename = '../../../public/Imagenes/fotorecortada.jpg';

$src = '../../../public/Imagenes/foto.jpg';
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

imagecopyresampled($dst_r,$img_r,0,0,$datos[0],$datos[1],
$targ_w,$targ_h,$datos[2],$datos[3]);

imagejpeg($dst_r, $output_filename, $jpeg_quality);

echo 'Recortada correctamente';

