<?php
/**
 * Controlador mostrar
 * - Carga los elementos necesarios
 */

 # Carga la configuración 
 include('config/db.php');

 # Carga las Clases
 include('class/class.conexion.php');
 include('class/class.corredores.php');


 # Carga el modelo
 include('models/model.mostrar.php');

 # Carga la vista
 include('views/view.mostrar.php');


?>