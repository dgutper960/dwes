<?php
/**
 * Model Eliminar.php
 * - Elimina un corredor por id
 */

 # Capturamos el id
 $id_eliminar = $_GET['id'];

 # Conectamos
 $conexion = new Corredores();

 # Eliminamos corredor por id
 // este método elimina además los registros del corredor, ya que la BBDD no tiene delete_in_cascade
 $conexion->delete($id_eliminar);

 # Corredor eliminado re resireccion a a index desde el controlador
?>