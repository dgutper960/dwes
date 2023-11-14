<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del artículo que quiero mostrar
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos

    # Cargamos los datos a partir de los métodos estáticos de la clase
    $categorias = ArrayArticulos::getCategorias(); // getCategorias -> Método estático
    $marcas = ArrayArticulos::getMarcas(); // getMarcas -> Método estático

    # Cargamos los datos
    $articulos = new ArrayArticulos();

    $articulos->getDatos();

    # Debemos buscar en la tabla el id del artículo a editar
    $idEditar = $_GET['id'];

    # Usamos la funcion buscar de ArrayArticulos
    $articulo = $articulos->read($idEditar);
?>