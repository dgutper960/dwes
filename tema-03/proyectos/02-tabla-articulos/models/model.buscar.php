<?php
/*
        Modelo: modelBuscar.php
        Descripción: filtra los libros a partir de un criterio de busqueda

        Método GET:
            - Expresión del prompt
    */

    # Cargamos la tablas
    $articulos = generar_tabla();
    $categorias = generar_categoria();  

    // Extraemos el criterio de ordenación a través del metodo get
    $expresion = $_GET['expresion'];
    
    # filtramos la tabla a partir de esa expresion

    // creamos un array vacio y cargamos los libros que cumplen con la expresión
    $aux = [];

    foreach($articulos as $articulo) {
        if(array_search($expresion, $articulo)) {
            $aux[] = $articulo;
        }
    }

    # Validamos la busqueda
    if(!empty($aux)) { 
        $articulo = $aux;    
    }




?>