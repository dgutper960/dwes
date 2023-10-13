<?php

// array de varias dimensiones

$numeros = [
    [6,8],
    [20,41],
    [11,24]
];

// en cada índice del array hay otro array
// para especificar un valor hay que indicar dos índices
echo $numeros[0][1]; // muestra el 8
echo $numeros[2][0]; // muestra el 11

// funcion que muestra los valores de un array
print_r($numeros[1]); // muestra el [20, 41] 

// print_r -> en navegador click derecho mostrar cod fuente lo muestra formateado


?>