<?php

/**
 * Gestión de Directorio
 *  copiar, mover, renombrar, eliminar
 */


$archivo = glob('files/*.*'); // devuelve archivos (contenido)
print_r($archivo);

echo '<br>';

$archivo = glob('files/*'); // devuelve archivos y directorios
print_r($archivo);

echo '<br>';

$archivo = glob('files/*.txt'); // devuelve archivos con extension txt
print_r($archivo);

