<?php
/*
        Modelo: modelMostrar.php
        Descripción: ordena los libros según un criterio seleccionado

        Método GET:
            - Criterio del libro
    */

# Cargamos la tabla
$libros = generar_tabla();

// Extraemos el criterio de ordenación a través del metodo get
$criterio = $_GET['criterio'];

# Ordenar la tabla de libros

// cargamos en un array lod valores del criterio de ordenación
$aux = array_column($libros, $criterio);

// controlamos que no se busquen criteros no existentes
if (!in_array($criterio, array_keys($libros[0]))) { // $libros[0] = indices asociativos
    echo 'ERROR!!: Criterio de búsqueda inexistente';
    exit();
}

// funcion array_multisort
array_multisort($aux, SORT_ASC, $libros);

?>