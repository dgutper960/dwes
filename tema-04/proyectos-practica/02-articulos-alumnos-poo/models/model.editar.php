<?php
/*
    Modelo: modelEditar.php
    Descripción: editar los detalles de un alumno

    Método GET:
        - id del articulo que quiero editar
*/
setlocale(LC_MONETARY, "es_ES"); // Indicamos

# Cargamos los datos a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignaturas();
$cursos = ArrayAlumnos::getCursos();


# Cargamos los datos
$alumnos = new ArrayAlumnos();

$alumnos->getDatos();

# Debemos buscar en la tabla el id del alumno a editar
$indiceEditar = $_GET['indice'];

# Usamos la funcion buscar de ArrayAlumnos
$alumno = $alumnos->read($indiceEditar);

?>