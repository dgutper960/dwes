<?php


/*
    Modelo: model.buscar.php
    Descripción: filtra los elementos de la tabla según criterios de busqueda
    
    Método GT:
        -Expresión prompt
*/

# Cargamos la tabla
$libros = generar_tabla();

# Extraemos la expresión de búsqueda
$expresion = $_GET['expresion'];

/*
Almacenaremos los elementos con coincidencias en otro array
 */
$libros_coincidentes = [];

// recorremos el array y almacenamos las coincidencias
foreach ($libros as $libro) {
    if(array_search($expresion, $libro)) {
        $libros_coincidentes[] = $libro;
    }
}

# Modificamos la tabla solo con los nuevos valores
if(count($libros_coincidentes) > 0) {
    $libros = $libros_coincidentes;
}else{
    echo'No se han encontrado coincidencias';
}

?>