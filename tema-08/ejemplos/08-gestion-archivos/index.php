<?php


/**
 * Gestión de Ficheros
 *  copiar, mover, renombrar, eliminar
 */

 # Abrimos el archivo
 // partimos de un archivo en la carpeta principal
// copiamos una nueva version
// copy('datos.txt', 'datos2.txt');
// echo 'archivo copiado con éxito';

// copiamos archivo en otra carpeta
// copy('datos2.txt', 'files/datos2.txt');
// echo 'Archivo Copiado Correctamente';

// copiar el archivo en otra carpeta + cambio de nombre de la copia
// copy('datos2.txt', 'files/datos.txt');
// echo 'Archivo Copiado Correctamente';


// Machacamos al original
// copy('datos.txt', 'files/datos.txt');
// echo 'Archivo Copiado Correctamente';
//-> En este caso machacamos el original sin ningun tipo de aviso ni advertencia


// Cambiar nombre a un archivo
// rename('datos.txt', 'detalles.txt');
// echo 'Cámbio de nombre realizado con éxito';

// Mover el archivo
// rename('detalles.txt', 'files/detalles.txt'); //-> Al moverlo también podemos modificar el nombre
// echo 'Archivo movido correctamente'

// Eliminar
// unlink('datos2.txt');
// echo('Archivo eliminado con éxito'); 
