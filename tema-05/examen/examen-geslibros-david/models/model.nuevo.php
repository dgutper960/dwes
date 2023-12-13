<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */

    $conexion = new Libros();

    // cargamos los autores
    $autores = $conexion->getAutores(); // lista desplegable

    // cargamos las editoriales
    $editoriales = $conexion->getEditoriales(); // lista desplegable

    // no necesitamos la lista de libros

   
    
?>