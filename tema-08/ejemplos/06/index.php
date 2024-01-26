<?php


/**
 * 
 */

 # Abrimos el archivo
 $fichero = "files/datos.txt";

 # Comprobamos si es un fichero
 if(is_file($fichero)){
   echo 'Es un fichero';
   echo '<br>';
   echo 'Su tamaño es: '.filesize($fichero).'Bytes';
 }

echo 'br';

if(is_dir('files')){
   echo 'Es un directorio';
}



