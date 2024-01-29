<?php


/**
 * Gestión de Directorio
 *  copiar, mover, renombrar, eliminar
 */

# Mostramos el directorio actual ruta absoluta de todo el sistema (desde C:)
echo 'Directorio Actual' . getcwd();

echo '<br>';

# Abrimos el directorio 'files'
if ($gestor = opendir('files')) {

    echo 'Gestor de directorio' . $gestor;

    while ($entrada = readdir($gestor)) {
        // echo(is_file($entrada) ? 'directorio' : 'fichero');
        // echo ' -- ';
        echo $entrada;
        echo '<br>';
    }

    # Cierro el directorio
    closedir($gestor);
    echo 'directorio cerrado correctamente';

}else{

    echo "Error de apertura del directorio";
}



