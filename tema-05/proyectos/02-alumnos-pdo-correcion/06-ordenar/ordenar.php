<?php

    /*
        Controlador ordenar con PDO
    */

    # Cargamos configuración
    include('config/bd.php');

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.alumno.php');
    include('class/class.alumnos.php');

    # Cargo modelo
    include('models/model.ordenar.php');

    # Cargo vista
    include('views/view.index.php');

?>