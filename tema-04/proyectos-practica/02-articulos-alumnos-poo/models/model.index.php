<?php
    /*
        Modelo: model.index
        Descripcion: carga los arrays de:
            -> asignaturas (método estático de ArrayAlumnos)
            -> cursos (método estático de ArrayAlumnos)
            -> alumnos (método del objeto ArrayAlumnos)
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos

    # Cargamos los datos a partir de los métodos estáticos dde la clase
    $asignaturas = ArrayAlumnos::getAsignaturas();
    $cursos = ArrayAlumnos::getCursos();

    # Creamos un objeto de la clase ArrayAlumnos
    $alumnos = new ArrayAlumnos();

    # Cargamos los datos
    $alumnos->getDatos();



?>