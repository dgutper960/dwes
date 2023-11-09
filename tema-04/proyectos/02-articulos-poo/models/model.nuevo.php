<?php
    /*
        Modelo: model.nuevo.php
        Descripcion: genera un array de objetos de artículos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos

    # Cargamos los datos a partir de los métodos estáticos dde la clase
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    # Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();

    # Cargo los datos
    $articulos->getDatos();
?>