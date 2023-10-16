<?php

# Array asociativo
// valor de indice personalizado

// El primer índice es escalar
// El segundo indice es asociativo
$equipos = [

[
    'id' => 1,
    'nombre' => 'Real Madrid',
    'ciudad' => 'Madrid'
],[

    'id' => 2,
    'nombre' => 'Real Betis',
    'ciudad' => 'Sevilla'
],[
    'id' => 3,
    'nombre' => 'FC Barcelona',
    'ciudad' => 'Barcelona',
]

];

// convertimos el array equipo en una cadena de texto
foreach($equipos as $equipo){
    echo implode(',', $equipo);
    echo '<br>';
}// muestra una lista con los equipos

?>