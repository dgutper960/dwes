<?php

/*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un libro

        Método GET:
            - id del libro que quiero editar
            - id 
    */

# Cargamos la tabla
$articulos = generar_tabla();

# Cargamos las categorías
$categorias = generar_categoria();

// Extraemos el valor del id a través del metodo get
$id = $_GET['id'];

// El problema de buscar el primer valor (1) es que entiende que se trata de 0, por lo que sería false
$indice_editar = buscar_en_tabla($articulos, 'id', $id);
// Comparación estricta para distinguir el false de 0
if ($indice_editar !== false) {
    // Obtengo el array del articulo
    $articulo = $articulos[$indice_editar];
} else {
    echo 'ERROR: Libro no encontrado';
    exit();
}

?>
