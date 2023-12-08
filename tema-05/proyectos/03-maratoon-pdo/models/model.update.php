<?php

/**
 * Model Update.php
 *  - Captura y valida los datos de la vista editar.php
 * 
 */
# Obtenemos el di del corredor 
$id_editar = $_GET['id'];


# Capturamos los datos en variables:
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$ciudad = $_POST['ciudad'];
$sexo = $_POST['sexo'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$id_categoria = $_POST['id_categoria'];
$id_club = $_POST['id_club'];

# Validamos (por el momento no necesario)

# Instanciamos un objeto de la clase Corredor
// Usamos el constructor de la clase para inicializar los atributos
$corredor = new Corredor(
    null,
    $nombre,
    $apellidos,
    $ciudad,
    $sexo,
    $fechaNacimiento,
    $email,
    $dni,
    null,
    $id_categoria,
    $id_club
);

# Conectamos y buscamos el corredor a editar:
$conexion = new Corredores();

$conexion->update($id_editar, $corredor);
// el corredor se ha actualizado en la BBDD

// # REDIRECCIONAMOS AL CONTROLADOR PRINCIPAL
// Ya hemos añadido a la base de datos, cargamos el index en el controlador



?>