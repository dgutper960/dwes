<?php

    /*
        Controlador principal index con PDO
    */

    # Cargamos configuración
    include('config/bd.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
   // include('class/class.alumno.php'); NO INSTANCIAMOS ALUMNO EN NINGUN MOMENTO
    include('class/class.alumnos.php');

    # Cargo modelo
    include('models/model.mostrar.php');

    # Cargo vista
    include('views/view.mostrar.php');

?>