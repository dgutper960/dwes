<?php

/**
 * Model Eliminar

 * - Carga un corredor mediante GET-id
 */
#Pescamos el id por GET
$id_eliminar = $_GET['id'];

# Conectamos
$conexion = new Corredores();

# Necesitamos obtener un corredor por id
$corredor = $conexion->delete($id_eliminar)


?>