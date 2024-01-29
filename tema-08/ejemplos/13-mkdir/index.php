<?php

/**
 * Gestión de Directorio
 *  copiar, mover, renombrar, eliminar
 */


# Mostramos el directorio actual

echo "Directorio Relarivo Actual: ".basename(getcwd());

echo '<br>';

// cambiamos de directorio
chdir('files');
echo "Directorio Relarivo Actual: ".basename(getcwd());
echo '<br>';
// creamos un nuevo directorio

mkdir('images');

mkdir('images/dev');

echo 'Directorio/s creados correctamente';

// elimina carpeta images
chdir('..');


