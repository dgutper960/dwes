<?php

    /*
        Controlador principal index con PDO
    */

    # Cargamos configuración
    include('config/bd.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.alumno.php');
    include('class/class.alumnos.php');

    # Cargo modelo
    include('models/model.update.php');

    # Redireccionamos 
    header('location: index.php');

?>