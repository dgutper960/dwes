<?php

/**
 * Model Ordenar
 * modelo para mostrar los corredoeres oredenados por criterio en la vista principal
 */
# Obtenemos el criterio de ordenacion
$expresion = $_GET['expresion'];

# Instanciamos un objeto de la clase Corredores
// Ejecuta la conexión
$conexion = new Corredores();

# Llamamos al metodo order() de Corredores y pasamos el criterio como argumeto
$corredores = $conexion->filter($expresion);


?>