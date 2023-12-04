<?php

    /*

        Modelo Principal index

    */

    # creamos objeto de la clase conexion (Alumnos hereda de conexión)
    // conexion con la BBDD
    $conexion = new Alumnos(); // Alumnos no tiene constructor pero hereda el de la clase conexión

    # extraigo los valores de los alumnos
    // objeto de la clase pdo stmt
    $alumnos = $conexion->getAlumnos();
    

?>