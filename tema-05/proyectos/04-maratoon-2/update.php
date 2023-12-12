<?php
/**
 * Controlador principal
 * - Carga los elementos necesarios
 */

 # Carga la configuración 
 include('config/db.php');

 # Carga las Clases
 include('class/class.conexion.php');
 include('class/class.corredor.php'); // se debe instanciar un corredor
 include('class/class.corredores.php');

 # Carga el modelo
 include('models/model.update.php');

 # Una vez cargado el corredor en la BBDD, redireccionamos a index.php
//  include('views/view.nuevo.php');
header('location: index.php');


?>