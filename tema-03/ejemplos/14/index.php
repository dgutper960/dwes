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

// recorremos el array
foreach($equipos as $equipo){
    print_r($equipo);
    echo '<br>';
} // -> Así lo imprime todo NO LO QUEREMOS


// Así lo imprime bien pero no es optimo
foreach($equipos as $equipo){
    echo 'id: '.$equipo['id'];
    echo '<br>';
    echo 'nombre: '.$equipo['nombre'];
    echo '<br>';
    echo 'ciudad: '.$equipo['ciudad'];
    echo '<br>';
}

// Usamos la sintaxis adecuada
foreach($equipos as $equipo){
    foreach($equipo as $key => $dato){
        echo "$key: ".$dato;
        echo '<br>';
    }
}




print_r($equipos);

echo '<br>';

echo $equipos[1]['Ciudad'];  

// Se usan para consultas en BBDD
// SQL devuelve el resultado en este tipo de array

?>