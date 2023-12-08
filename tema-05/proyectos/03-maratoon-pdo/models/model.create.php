<?php

/**
 * Model Create.php
 *  - Captura y valida los datos de la vista nuevo.php
 * 
 */
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
    $id_categoria,
    $id_club
);

// $corredor->nombre = $nombre;
// $corredor->apellidos = $apellidos;
// $corredor->ciudad = $ciudad;
// $corredor->sexo = $sexo;
// $corredor->fechaNacimiento = $fechaNacimiento;
// $corredor->email = $email;
// $corredor->dni = $dni;
// $corredor->id_categoria = $id_categoria;
// $corredor->id_club = $id_club;



# Usamos el método inster_corredor de Corredores
$corredores = new Corredores();
$corredores->insert_corredor($corredor);
// el corredor se ha insertado en la BBDD

// # REDIRECCIONAMOS AL CONTROLADOR PRINCIPAL
// Ya hemos añadido a la base de datos, cargamos el index en el controlador



?>