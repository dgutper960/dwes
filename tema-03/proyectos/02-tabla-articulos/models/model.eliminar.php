<?php
/*
        Modelo: model.eliminar.php
        Descripción: eliminar un elemento de la tabla. El proceso de eliminar se hace aquí

        Método GET:
            - id del elemento a eliminar
    */

# Cargamos la tabla
$articulos = generar_tabla();
$categorias = generar_categoria();

// Extraemos el valor del id a través del metodo get
$id = $_GET['id'];

// El problema de buscar el primer valor (1) es que entiende que se trata de 0, por lo que sería false
$indice_eliminar = buscar_en_tabla($articulos, 'id', $id);
// Comparación estricta para distinguir el false de 0
if ($indice_eliminar !== false) {
    // Elimino el libro seleccionado
    unset($articulos[$indice_eliminar]);
    // Reconstruye el array quitando huecos
    $articulos = array_values($articulos);
} else {
    echo 'ERROR: Libro no encontrado';
    exit();
}


?>