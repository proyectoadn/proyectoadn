<?php
namespace App\Clases;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bitacora
 *
 * @author Alber
 */
class Fichero {

//put your code here

    function EscribirLog($texto) {

        /* r
          Abre el archivo sólo para lectura. La lectura comienza al inicio del archivo.

          r+
          Abre el archivo para lectura y escritura. La lectura o escritura comienza
          al inicio del archivo.

          w
          Abre el archivo sólo para escritura. La escritura comienza al inicio del
          archivo, y elimina el contenido previo. Si el archivo no existe, intenta crearlo.

          w+
          Abre el archivo para escritura y lectura. La lectura o escritura comienza
          al inicio del archivo, y elimina el contenido previo. Si el archivo no existe, intenta crearlo.

          a
          Abre el archivo para sólo escritura. La escritura comenzará al final del
          archivo, sin afectar al contenido previo. Si el fichero no existe se intenta crear.

          a+
          Abre el archivo para lectura y escritura. La lectura o escritura comenzará al
          final del fichero, sin afectar al contenido previo. Si el fichero no existe se intenta crear. 

         *          */

        $hoy = date("j F, Y, g:i a");
        $file = fopen("Log/log.txt", "a");

        fwrite($file, '[' . $hoy . '] ' . $texto . "\r\n");
        fclose($file);
    }

}
