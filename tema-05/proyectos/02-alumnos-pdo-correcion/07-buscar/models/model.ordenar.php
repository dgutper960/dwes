<?php

    /*

        Modelo Ordenar

    */


    # obtenemos el criterio de búsqueda enviado por GET
    $criterio = $_GET['criterio'];

    
    # creamos objeto de la clase conexion (Alumnos hereda de conexión)
    // conexion con la BBDD
    $conexion = new Alumnos(); // LA CONEXON DEBE PONERSE SIEMPRE EN EL MOMENTO NECESARIO

    # Debemos tener un método en Alumnos que nos haga una consulta orderby
    # Ese parámetro de búsqueda tiene que venir de views/partials/menu
    # extraigo los valores de los alumnos
    // objeto de la clase pdo stmt
    $alumnos = $conexion->oreder($criterio);

?>