<?php
    /*
        Modelo: modelIndex
        Descripcion: genera un array de objetos de artículos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos

    # Cargamos los datos a partir de los métodos estáticos de la clase
    $asignaturas = ArrayAlumnos::getAsignaturas();
    $cursos = ArrayAlumnos::getCursos();

    # Creamos un objeto de la clase ArrayArticulos
    $alumnos = new ArrayAlumnos();
   
    # Cargo los datos
    $alumnos->getDatos();
    



?>