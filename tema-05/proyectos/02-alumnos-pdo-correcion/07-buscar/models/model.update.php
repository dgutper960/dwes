<?php

/*

    Modelo: model.update.php
    Descripcion: actualiza los detalles de un  artículo

    Método POST:
                    - id 
                    - nombre
                    - apellidos
                    - email
                    - telefono
                    - direccion
                    - poblacion
                    - provincia
                    - nacionalidad
                    - dni
                    - fechaNac
                    - id_curso
    

    Método GET:
                - id -> id  del alummno que quiero editar

*/

# obtener id del alumno
$id_editar = $_GET['id'];

# Cargamos en varibales detalles del  formulario
$nombre         = $_POST['nombre'];
$apellidos      = $_POST['apellidos'];
$email          = $_POST['email'];
$telefono       = $_POST['telefono'];
$direccion      = $_POST['direccion'];
$poblacion      = $_POST['poblacion'];
$provincia      = $_POST['provincia'];
$nacionalidad   = $_POST['nacionalidad'];
$dni            = $_POST['dni'];
$fechaNac       = $_POST['fechaNac'];
$id_curso       = $_POST['id_curso'];

# Creamos un  objeto de la clase Alumno
// Más adelante necesitaresmos validar antes de este paso
$alumno = new Alumno();

# Asignamos valores a las propiedades
$alumno->id = null;
$alumno->nombre = $nombre;
$alumno->apellidos = $apellidos;
$alumno->email = $email;
$alumno->telefono = $telefono;
$alumno->direccion = $direccion;
$alumno->poblacion = $poblacion;
$alumno->provincia = $provincia;
$alumno->nacionalidad = $nacionalidad;
$alumno->dni = $dni;
$alumno->fechaNac = $fechaNac;
$alumno->id_curso = $id_curso;

# Validación

# actualizamos datos

$alumnos = new Alumnos();
$alumnos->update_alumno($alumno, $id_editar);

// No debo cargar la vista view.index.php (DA ERROR)
// Tengo que cargar el controlador index.php
header('location: index.php');

?>
