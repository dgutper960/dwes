<?php
/**
 * Controlador principal
 * - Carga los elementos necesarios
 */

 # Carga la configuración 
 include('config/db.php');

 # Carga las Clases
 include('class/class.conexion.php');
 include('class/class.corredores.php');
 // include('class/class.corredor.php'); // se debe instanciar un corredor

 # Carga el modelo
 include('models/model.nuevo.php');

 # Carga la vista
 include('views/view.nuevo.php');


?>