<?php

    /*

        Modelo Principal index

    */

    # creamos objeto de la clase conexion (Alumnos hereda de conexión)
    $conexion = new Alumnos();

    # aextraigo los valores de los alumnos
    $alumnos = $conexion->getAlumnos();
    

?>