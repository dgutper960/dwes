<?php

    /*

        Modelo Filtrar

    */

    # creamos objeto de la clase conexion (Alumnos hereda de conexión)
    // conexion con la BBDD
    $conexion = new Alumnos();

    # obtenemos el criterio de búsqueda enviado por GET
    $expresion = $_GET['expresion'];

    # Debemos tener un método en Alumnos que nos haga una consulta filtrada por una expresión
    # Ese parámetro de búsqueda tiene que venir de views/partials/menu
    # extraigo los valores de los alumnos
    // objeto de la clase pdo stmt
    $alumnos = $conexion->filter($expresion);

?>