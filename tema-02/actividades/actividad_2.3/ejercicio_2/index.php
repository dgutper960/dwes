<?php

// Ejercicio 2. is_null().

// Crear un script PHP donde se muestre el resultado 
// de 3 valores verdaderos y tres valores falsos para la función is_null()

# Valores para verdadero    
    $x = null;
    $y;
    var_dump(is_null($x));
    var_dump(is_null($y));
    var_dump(is_null($z));

    # Se observa que is_null = true -> devuelve error

echo '<br>';


# Valores para falso
    $a = 0;
    $b = "";
    $c = [];
    var_dump(is_null($a));
    var_dump(is_null($b));
    var_dump(is_null($c));
?>