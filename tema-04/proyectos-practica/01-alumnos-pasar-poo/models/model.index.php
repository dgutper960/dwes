<?php

    /*
        fichero: model.index.php
        Descripción: modelo del proceso index.php

    */
    // cargamos los datos mediente los métodos estáticos
    $asignaturas = ArrayAlumnos::getAsignaturas();  
    $cursos = ArrayAlumnos::getCursos();

    // cargamos la table, debemos instanciar objeto de ArrayAlumno
    $alumnos = new ArrayAlumnos();
    // cargamos los datos
    $alumnos->getDatos();

    /**
     * Ya podemos trabajar en la vista
     */

    
    
?>