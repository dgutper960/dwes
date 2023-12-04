<?php

    /*

        Controlador: create.php
        Descripción: permite añadir a la tabla alumno de la bbdd fp un nuevo alumno
        
    */
    /**
     * DEBEMOS CARGAR LOS PARAMETROS PARA LA CONEXION
     */
    include("config/bd.php");

    # Librería
    include 'class/class.conexion.php';
    include 'class/class.alumnos.php'; // SI ES NECESARIO
    include 'class/class.alumno.php';

    # Model
    include 'models/model.create.php';

    # REDIRECCIONAMOS AL CONTROLADOR PRINCIPAL
    // Ya hemos añadido a la base de datos, llamamos al index automáticamente
    header('location: index.php');

?>