<?php

## VARIABLES

// Tipos de variables
# tipo boolean

$test = false;
echo "\$test:";
// var_dump me indica el tipo de dato y más cosas
var_dump($test);

echo "<br>";

// #tipo float
$altura = 1.70;
echo "\$altura:";
var_dump($altura);

echo "<br>";

// # float exponencial
$distancia = 1.70e4;
echo "\$distancia";
var_dump($distancia);

echo "<br>";

//# tipo string comillas dobles
$mensaje = "La distancia recorrida fue de $distancia km";
echo "\$mensaje; ";
var_dump($mensaje);

echo "<br>";

// # tipo string comillas simples
$mensaje = 'La distancia recorrida fue de '.$distancia.' km';
echo "\$mensaje; ";
echo "<br>";
var_dump($mensaje);

echo "<br>";



?>