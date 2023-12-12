<?php

/**
 * Model Editar php
 * - Necesitamos la lista desplegable para las categorías
 * - Necesitamos la lista desplegable para los clubs
 */

 # Capturamos el id del corredor a editar
 $id_editar = $_GET['id'];

 # Establecemos la conexión 
 $conexion = new Corredores();

 # Cargamos las categorias y los clubs
 $categorias = $conexion->getCategorias();
 $clubs = $conexion->getClubs();

 # Cargamos los datos del corredor por su id
 $corredor = $conexion->read($id_editar);

 // Ya podemos continuar



?>