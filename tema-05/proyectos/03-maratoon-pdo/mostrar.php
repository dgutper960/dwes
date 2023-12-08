<?php

/**
 * Cargamos la configuración, clases, modelo y vista necesarios
 */

include('config/db.php');

include('class/class.conexion.php');
//include('class/class.corredor.php'); // NO deberemos instanciar un objeto de corredor
include('class/class.corredores.php');

include('models/model.mostrar.php');


include('views/view.mostrar.php');


?>