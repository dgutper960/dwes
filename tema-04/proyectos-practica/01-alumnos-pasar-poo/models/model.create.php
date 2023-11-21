<?php

    /*

        model.create.PHP

        - Añade un elemento a la tabla 

    */
        // cargamos los datos mediente los métodos estáticos
        $asignaturas = ArrayAlumnos::getAsignaturas();  
        $cursos = ArrayAlumnos::getCursos();
    
        // cargamos la table, debemos instanciar objeto de ArrayAlumno
        $alumnos = new ArrayAlumnos();
        // cargamos los datos
        $alumnos->getDatos();

        /**
         * Capturamos los datos en variables
         */
        $id = count($alumnos->getTable())+1;
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $cursoAl = $_POST['curso'];
        $asigAl = $_POST['asignaturas'];
        
        /**
         * Creamos un nuevo alumno
         */
        $nuevoAlumno = new Alumno(
            $id,
            $nombre,
            $apellidos,
            $email,
            $telefono,
            $cursoAl,
            $asigAl
        );

        /**
         * Añadimos alumno a la tabla con método de la clase
         */
        $alumnos->create($nuevoAlumno);

?>