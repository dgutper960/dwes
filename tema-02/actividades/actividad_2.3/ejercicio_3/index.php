<?php

// Ejercicio 3. issetl().

// Crear un script PHP donde se muestre 
// el resultado de 3 valores verdaderos y tres valores falsos para la función isset()

# Valores para verdadero
    $a = 0;
    $b = "";
    $c = [];
    var_dump(isset($a));
    var_dump(isset($b));
    var_dump(isset($c));

    # Se observa que isset() = true -> no devuelve error

echo '<br>';

# Valores para falso   
    $x = null;
    $y;
    var_dump(isset($x));
    var_dump(isset($y));
    var_dump(isset($z));

# --> En todos los ejemplos anteriores para is_null(), isset() devolvería false 
#     mientras que is_null() devolvió true, por eso se consideran funciones opuestas


?>