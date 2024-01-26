<?php


/**
 * 
 */

 # Abrimos el archivo
 $fichero = "files/datos.txt";

 # Obtenemos un Array con los metadatos

 $datos_archivos = stat($fichero);

 print_r($datos_archivos);



