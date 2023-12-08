<?php

/**
 * Model Mostrar
 * - Carga las categorías 
 * - Carga los clubs
 * - Carga un corredor mediante GET-id
 */
#Pescamos el id por GET
$id_mostrar = $_GET['id'];


# Instanciamos objeto de Corredores para establecer la conexión
$conexion = new Corredores;

# Cargamos las categorías para la lista desplegable dinámica
$caregorias = $conexion->getCategorias();

# Cargamos los clubs para la lista desplegable dinámica
$clubs = $conexion->getClubs();

# Conectamos
$conexion = new Corredores();

# Necesitamos obtener un corredor por id
$corredor = $conexion->read($id_mostrar)


?>