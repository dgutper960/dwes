<?php

/**
 * Debemos habilitar la directiva extension=zip en PHP.init (Apache -> Config de XAMPP)
 * -> Buscar la directiva y descomentarla eliminando el ;
 */

 $archivo_zip = "files.zip";
 // Creamos una instancia de la clase ZipArchive:
 $zip = new ZipArchive();
 // Abrimos el archivo zip:
 if($zip->open($archivo_zip) === true)
 {
 $zip->extractTo('./imagenesAfotos/');
 $zip->close();

 echo 'Archivo descomprimido';
 } else {
 echo 'Error al descomprimir';
 }
 
?>