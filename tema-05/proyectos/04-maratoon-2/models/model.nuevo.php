<?php

/**
 * Model Nuevo php
 * - Necesitamos la lista desplegable para las categorías
 * - Necesitamos la lista desplegable para los clubs
 */

 # Establecemos la conexión 
 $conexion = new Corredores();

 # Cargamos las categorías
 $categorias = $conexion->getCategorias();

 # Cargamos los clubs
 $clubs = $conexion->getClubs();

 // Ya podemos continuar



?>
