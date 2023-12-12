<?php
/**
 * Model Index php
 * - Carga los datos de la BBDD para la vista principal
 */

 # Establecemos la conexion
 $conexion = new Corredores;
 
 # Igualamos la variable a la llamada del método getCorredores de Corredores
 $corredores = $conexion->getCorredores();

 # Ya disponemos de los datos para la vista



?>