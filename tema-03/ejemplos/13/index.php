<?php

# for y foreach

$numeros = array(4, 5, 7, 10, 60, 90);

// recorremos el array con un for normal
// usamos la función count() por la propiedad length
for ($i = 0; $i < count($numeros); $i++) {
    echo $i;
    echo '=>';
    echo $numeros[$i];
    echo '<br>';
}

// podríamos borrar un elemento con
unset($numeros[3]); // borramos el elemento '10'

// al recorrerlo con foreach vemos los indices -> [1][2][4][5][6]
foreach($numeros as $num){
    echo $num;
    echo '<br>';
}

// si añadimos el elemento de forma manual, se añade al final -> [1][2][4][5][6][3]
$numeros[3] = 10;


?>