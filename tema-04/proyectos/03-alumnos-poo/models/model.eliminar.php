<?php
/*
    Modelo: model.eliminar.php
    Descripción: eliminar un elemento de la tabla

    Método GET:
        - id del artículo que quiero eliminar
*/
setlocale(LC_MONETARY, "es_ES"); // Indicamos

# Cargamos los datos a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignaturas();
$cursos = ArrayAlumnos::getCursos();


# Cargamos los datos
$alumnos = new ArrayAlumnos();

$alumnos->getDatos();

# Debemos buscar en la tabla el id del alumno a editar
$indiceBorrar = $_GET['indice'];


# Usamos la funcion delete()
$alumnos->delete($indiceBorrar);


# Generamos una notificación para feed-back al usuario
$notificacion = 'Alumno borrado con éxito';



?>