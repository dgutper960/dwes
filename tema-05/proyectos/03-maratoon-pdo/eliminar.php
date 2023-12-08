<?php

/**
 * Cargamos la configuración, clases, modelo y vista necesarios
 */

include('config/db.php');

include('class/class.conexion.php');
//include('class/class.corredor.php'); // Se instancia esta clase
include('class/class.corredores.php');

include('models/model.eliminar.php');


// include('views/view.index.php');
header('location: index.php');


?>