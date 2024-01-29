<?php

/**
 * Gestión de Directorio
 *  copiar, mover, renombrar, eliminar
 */


# Mostramos el directorio actual
echo "Directorio Absoluto Actual: ".getcwd();

echo '<br>';

echo "Directorio Relarivo Actual: ".basename(getcwd());

echo '<br>';

echo "Directorio Padre Relarivo: ".dirname(getcwd());


