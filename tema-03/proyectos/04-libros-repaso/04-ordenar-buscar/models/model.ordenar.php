<?php
/*
        Modelo: model.ordenar.php
        Descripción: ordena los elementos según criterio

        Método GET:
            - Criterio de busqueda
    */

# Cargamos la tabla
$libros = generar_tabla();

// Extraemos el criterio a ordenar
$criterio = $_GET['criterio'];

# Cargamos en un array auxiliar los valores del criterio
// array_column para extraer los valores de una sola columna de un array multidimensional
$valores_criteiro = array_column($libros, $criterio);

// controlamos que no se busquen criteros no existentes
if (!in_array($criterio, array_keys($libros[0]))) { // $libros[0] = indices asociativos
    echo 'ERROR!!: Criterio de búsqueda inexistente';
    exit();
}

// ordenamos el array libros con la funcion multisort()
array_multisort($valores_criteiro, SORT_ASC, $libros);

?>