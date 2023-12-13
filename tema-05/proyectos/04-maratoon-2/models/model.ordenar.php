<?php

/**
 * Modelo oredenar.php
 * - Ordena segun criterio de búsqueda
 * - Criterios enviados de menu.php
 * - Método GET
 */

// Capturamos el criterio
$criterio = $_GET['criterio']; // valor numérico

// usamos el método order que implementa SELECT mediante orderby
$conexion = new Corredores();
$corredores = $conexion->order($criterio);




?>