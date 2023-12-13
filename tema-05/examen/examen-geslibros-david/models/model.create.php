<?php

    /*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */

    // Capturamos los campos del formulario
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $fecha_edicion = $_POST['fecha_edicion'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $stock = $_POST['stock'];
    $precio_coste = $_POST['precio_coste'];
    $precio_venta = $_POST['precio_venta'];

    // instanciamos un objeto de Libro, usando el constructor
    $libro = new Libro(
        null,
        $isbn,
        null,
        $titulo,
        $autor,
        $editorial,
        $precio_coste,
        $precio_venta,
        $stock,
        null,
        null,
        $fecha_edicion
    );

    # Conectamos
    $conexion = new Libros();

    // pasamos el objeto como parametro del método instertar
    $conexion->insertarLibro($libro);

?>