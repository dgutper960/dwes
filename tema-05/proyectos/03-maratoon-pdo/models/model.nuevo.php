<?php

/**
 * Model Nuevo
 * - Carga las categorías 
 * - Carga los clubs 
 */

# Instanciamos objeto de Corredores para establecer la conexión
$conexion = new Corredores;

# Cargamos las categorías para la lista desplegable
$caregorias = $conexion->getCategorias();

# Cargamos los clubs para la lista desplegable
$clubs = $conexion->getClubs();

// EN ESTE MOMENTO YA TENEMOS LOS DATOS NECESARIOS PARA LA VISTA


?>