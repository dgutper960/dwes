<?php

/**
 * Modelo buscar.php
 * - Ordena segun criterio de búsqueda
 * - Expresiones enviadas de menu.php
 * - Método GET
 */

// Capturamos el criterio
$expresion = $_GET['expresion']; // valor numérico

// usamos el método order que implementa SELECT mediante orderby
$conexion = new Corredores();
$corredores = $conexion->buscar($expresion);




?>