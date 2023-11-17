<?php
    /*
        Modelo: modelUpdate.php
        Descripción: actualiza los detalle de un articulo

        Método POST 
            - descripcion
            - modelo
            - Marca
            - categorias (valor númerico)
            - unidades
            - precio
        
        Método GET
            - id
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

$indice = $_GET['indice'];

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
$alumnos->update($alumno, $indice);

# Generamos una notificación para feed-back al usuario
$notificacion = 'Alumno editado con éxito';
?>