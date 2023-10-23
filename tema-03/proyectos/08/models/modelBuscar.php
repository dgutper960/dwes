<?php
/*
        Modelo: modelBuscar.php
        Descripción: filtra los libros a partir de un criterio de busqueda

        Método GET:
            - Expresión del prompt
    */

    # Cargamos la tablas
    $libros = generar_tabla();

    // Extraemos el criterio de ordenación a través del metodo get
    $expresion = $_GET['expresion'];
    
    # filtramos la tabla a partir de esa expresion

    // creamos un array vacio y cargamos los libros que cumplen con la expresión
    $aux = [];

    foreach($libros as $libro) {
        if(array_search($expresion, $libro)) {
            $aux[] = $libro;
        }
    }

    # Validamos la busqueda
    if(!empty($aux)) { 
        $libros = $aux;    
    }




?>