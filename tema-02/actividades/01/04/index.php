<?php

/* Crear en un script php que cree dos variables 
una de tipo float y otra de tipo int. 
Almacenar en nuevas variables el resultado de la 
suma, resta, división, producto y potencia. 
Mostrar mediante var_dump() las variables con los resultados 
de las operaciones anteriores */

$float=5.5;
$int=64;

$suma= $float + $int;
$resta= $float - $int;
$prod= $float * $int;
$div= $float / $int;
$pot= pow($float, $int);

echo '$suma';
var_dump($suma);

echo '<br>';

echo "\$resta";
var_dump($resta);

echo '<br>';

echo '$prod';
var_dump($prod);

echo '<br>';

echo "\$div";
var_dump($div);

echo '<br>';

echo '$pot';
var_dump($pot);


?>