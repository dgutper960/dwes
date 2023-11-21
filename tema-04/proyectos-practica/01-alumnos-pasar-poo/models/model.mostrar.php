<?php

    /*

        Modelo: model.mostrar.PHP

        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */
    // cargamos los datos mediente los métodos estáticos
    $asignaturas = ArrayAlumnos::getAsignaturas();  
    $cursos = ArrayAlumnos::getCursos();

    // cargamos la table, debemos instanciar objeto de ArrayAlumno
    $alumnos = new ArrayAlumnos();
    // cargamos los datos
    $alumnos->getDatos();

    /**
     * Capturamos el alumno que queremos mostrar
     */
    $indice = $_GET['indice'];

    $alumno = $alumnos->read($indice);
   
    
    

?>