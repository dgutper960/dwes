<?php

/**
 * Cargamos la configuración, clases, modelo y vista necesarios
 */

include('config/db.php');

include('class/class.conexion.php');
include('class/class.corredor.php'); // Se instancia esta clase
include('class/class.corredores.php');

include('models/model.create.php');

# REDIRECCIONAMOS AL CONTROLADOR PRINCIPAL
// Ya hemos añadido a la base de datos, llamamos al index automáticamente
header('location: index.php');



?>