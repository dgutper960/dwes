<?php

/*

    Modelo eliminar.php

*/
# tomamos por GET el id del alumno a eliminar
$id_eliminar = $_GET['id'];

# creamos objeto de la clase conexion (Alumnos hereda de conexión)
// conexion con la BBDD
$conexion = new Alumnos();

# extraigo los valores de los alumnos y de los cursos
// objeto de la clase pdo stmt
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

# Eliminamos el alumno
$conexion->delete_alumno($id_eliminar);

$alumnos = $conexion->getAlumnos();

// No debo cargar la vista view.index.php
// Tengo que cargar el controlador index.php
header('location: index.php');

?>