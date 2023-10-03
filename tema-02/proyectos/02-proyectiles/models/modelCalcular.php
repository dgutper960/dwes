<?php

// definimos todas las variables
// gravedad es una constante
define('g', 9.8);

// tomamos los valores del usuario
$v0 = $_POST['v0'];
$a0 = deg2rad($_POST['a0']);

# hacemos los calculos


// vel inicial x
$vx = $v0 * cos($a0);

// vel inicial y
$vy = $v0 * sin($a0);

// Alcance Máximo
$xmax = (pow($v0, 2) * sin(2*$a0)) / $g;

// Tiempo de vuelo
$t = 2*($vy/$g);

// Altura máxima
$ymax = (pow($v0, 2)*pow(sin($a0), 2))/(2*$g);


?>