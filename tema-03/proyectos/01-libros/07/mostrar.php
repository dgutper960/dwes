<?php
    /*
        Controlador: mostrar.php
        Descripción: permite mostrar los detalles de un libro
     */

    #Libreria
    include 'libs/crud_funciones.php';

    # Modelo
    include 'models/modelIndex.php';
    include 'models/modelMostrar.php'; // No se puede varios modelos en un controladorr

    # Vista
    include 'views/viewMostrar.php';
?>