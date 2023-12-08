<?php

/**
 * Cargamos la configuración, clases, modelo y vista necesarios
 */

include('config/db.php');

include('class/class.conexion.php');
//include('class/class.corredor.php'); en inigun momento se instancia esta clase
include('class/class.corredores.php');

include('models/model.filtrar.php');

// Si redireccionamos se pierde la consulta sql del método filter()
include('views/view.index.php');
// header('location: index.php');


?>