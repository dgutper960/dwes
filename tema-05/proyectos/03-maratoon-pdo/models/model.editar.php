<?php

/**
 * Model Editar
 * - Carga las categorías 
 * - Carga los clubs
 * - Carga un corredor mediante GET-id
 */
#Pescamos el id por GET
$id_editar = $_GET['id'];


# Conectamos
$conexion = new Corredores();


# Cargamos las categorías para la lista desplegable dinámica
$caregorias = $conexion->getCategorias();

# Cargamos los clubs para la lista desplegable dinámica
$clubs = $conexion->getClubs();


# Necesitamos obtener un corredor por id
$corredor = $conexion->read($id_editar)


?>