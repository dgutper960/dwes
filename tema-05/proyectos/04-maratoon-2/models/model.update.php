<?php
/**
 * Model Update
 * - Capturamos los datos de la vista
 * - Actualizamos el corredor con los nuevos datos
 * */

 // capturamos el id por GET
 $id_editar = $_GET['id_editar'];

// capturamos los datos con PODS
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$ciudad = $_POST['ciudad'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$id_categoria = $_POST['id_categoria'];
$id_club = $_POST['id_club'];

// instanciamos un objeto de la clase Corredor
$corredor = new Corredor(
    null, // int_auto_increment
    $nombre,
    $apellidos,
    $ciudad,
    $fechaNacimiento,
    $sexo,
    $email,
    $dni,
    null, // campo calculado al cargar view index
    $id_categoria,
    $id_club
);

// conectamos con la BBDD
$conexion = new Corredores();

// llamamos al método para insertar el corredor en la BBDD
$conexion->update($id_editar, $corredor);
// en este momento, el corredor se ha insertado


?>