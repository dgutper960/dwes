<?php


/**
 * 
 */

 # Abrimos el archivo
 $fichero = "files/Ejemplo.txt";
 $fp = fopen($fichero, 'rb');

 while(!feof($fp)){

    $linea = fgets($fp);
    echo $linea;
    echo '<br>';
 }

 # Cerrar archivo
 fclose($fp);


