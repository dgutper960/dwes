<?php
/**
 * Controlador Mostrar.php
 * - Carga los datos de un corredor seleccionado por el ususario
 * - Método GET
 *      - id
 */

// capturamos el id enviado por GET
$id_mostrar = $_GET['id'];



// conectamos con la BBDD
$conexion = new Corredores();

// cargamos las categorias
$categorias = $conexion->getCategorias();
// cargamos los clubs
$clubs = $conexion->getClubs();
// Cargamos el corredor con el método read()
// read retorna un objeto del corredor correspondiente
$corredor = $conexion->read($id_mostrar);

# Ya tenemos los datos para la vista





?>