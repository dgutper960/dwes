<?php

    // Ejercicio 4. empty().

    // Crear un script PHP donde se muestre 
    // el resultado de 3 valores verdaderos y tres valores falsos para la función empty()

    # Valores para verdadero
    $a = 0;
    $b = "";
    $c = "0"; 
    var_dump(empty($a));
    var_dump(empty($b));
    var_dump(empty($c));

echo '<br>';

# Valores para falso   
    $x = " ";
    $y = [0];
    $z = true; // false da true
    var_dump(empty($x));
    var_dump(empty($y));
    var_dump(empty($z));


?>