<?php

    /*
        fichero: model.nuevo.php
        Descripción: modelo del proceso nuevo.php. 

    */
    // cargamos los datos mediente los métodos estáticos
    $asignaturas = ArrayAlumnos::getAsignaturas();  
    $cursos = ArrayAlumnos::getCursos();

    // cargamos la table, debemos instanciar objeto de ArrayAlumno
    $alumnos = new ArrayAlumnos();
    // cargamos los datos
    $alumnos->getDatos();

    
   

    
?>