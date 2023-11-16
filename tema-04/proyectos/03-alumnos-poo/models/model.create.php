<?php
/*
    apellidos: model.create.php
    Descripción: Cargaremos los datos del formulario nuevo y los introducimos al array original de artículos

    Método POST 
                $id,
                $nombre,
                $apellidos,
                $email,
                $fecha_nac,
                $curso,
                $asignaturas
    
    El id será generado de forma automatica por la función ultimoId()
*/


// Carga de datos
setlocale(LC_MONETARY, "es_ES"); // Indicamos

# Cargamos los datos a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignaturas(); 
$cursos = ArrayAlumnos::getCursos();

# Creamos un objeto de la clase ArrayAlumnos
$alumnos = new ArrayAlumnos();

# Creamos un objeto de Alumno
$articulo = new Alumno();

# Cargo los datos
$alumnos->getDatos();

// Recogemos los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$fecha_nac = $_POST['fecha'];
$fecha_nac = date('d/m/Y', strtotime($fecha_nac));
$curso = $_POST['curso'];
$asignaturasNew = $_POST['asignaturas'];

# Creamos un objeto de articulo y añadimos los valores
$alumno = new Alumno(
    $id,
    $nombre,
    $apellidos,
    $email,
    $fecha_nac,
    $curso,
    $asignaturasNew
);

// Añadimos el alumno usando la funcion create de ArrayAlumnos
$alumnos->create($alumno);

# Generamos una notificación para feed-back al usuario
$notificacion = 'Alumno añadido con éxito';

?>