<?php

// cargamos la configuracion
include('config/db.php');

// cargamos las clases
include('class/class.conexion.php');
include('class/class.corredores.php');

// cargamos el modelo
include('models/model.eliminar.php');

// cargamos la vista
# Una vez eliminado el corredor, redireccionamos
header('location: index.php');


?>