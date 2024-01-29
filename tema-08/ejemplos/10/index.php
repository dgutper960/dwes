<?php


/**
 * Gestión de Directorio
 *  copiar, mover, renombrar, eliminar
 */

 # Mostramos el directorio actual ruta absoluta de todo el sistema (desde C:)
 echo 'Directorio Actual'.getcwd();

echo '<br>';

$contenido = scandir('files');

print_r($contenido);

  