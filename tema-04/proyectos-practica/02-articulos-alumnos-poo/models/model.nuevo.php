<?php
/*
    Modelo: model.nuevo.php
    Descripcion: genera un array de objetos de artículos
*/
setlocale(LC_MONETARY, "es_ES"); // Indicamos

# Cargamos los datos a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignaturas();
$cursos = ArrayAlumnos::getCursos();


?>