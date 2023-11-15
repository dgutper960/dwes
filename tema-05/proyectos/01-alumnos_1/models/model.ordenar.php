<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los libros a partir de un criterio

        Método GET:
            - criterio: titulo, autor, genero, precio.
    */

    setlocale(LC_MONETARY,"es_ES"); // Indicamos

    # Cargamos los datos a partir de los métodos estáticos de la clase
    $categorias = ArrayArticulos::getCategorias(); // getCategorias -> Método estático
    $marcas = ArrayArticulos::getMarcas(); // getMarcas -> Método estático

    # Cargamos los datos
    $articulos = new ArrayArticulos();

    $articulos->getDatos();

    // Cargo el criterio de ordenación
    $criterio = $_GET['criterio'];

    // Invocamos la función que se encargará de ordenar el contenido de la vista
    $articulos->setTabla($articulos->ordenar($criterio));
    
?>