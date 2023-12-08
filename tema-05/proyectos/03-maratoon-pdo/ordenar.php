<?php

/**
 * Cargamos la configuración, clases, modelo y vista necesarios
 */

include('config/db.php');

include('class/class.conexion.php');
//include('class/class.corredor.php'); en inigun momento se instancia esta clase
include('class/class.corredores.php');

include('models/model.ordenar.php');


include('views/view.index.php');


?>