<?php

    // Ejercicio 1. Conversiones de datos en expresiones.

    // Crear un script PHP donde se muestre el tipo de dato y resultado de las siguientes expresiones matemáticas:

    // Multiplica valor entero con una cadena que contiene un número inicial
    $cad= '13 no es un número cualquiera';
    $int = 34;
    $res = $int * (integer)$cad;
    var_dump($res); 

    echo '<br>';

    // Sumar valor entero con cadena con número inicial
    $cad= '13 no es un número cualquiera';
    $int = 34;
    $res = $int + (integer)$cad;
    var_dump($res);

    echo '<br>';

    // Sumar valor entero con valor float
    $int = 12;
    $float = 18.98;
    $res = $int+$float;
    var_dump($res);

    echo '<br>';   
    
    // Concatenar valor entero con cadena
    $entero = 83;
    $cadena1 = 'A la edad de ';
    $cadena2 = ' goza de buena salud';
    $concat = $cadena1.$entero.$cadena2;
    $concat2 = 'El mundial de España no fue en el año '.$entero.', sino que fue en el 82';
    $cadena = "En el año 19$entero ARPANET dejó de lado el protocolo NPC y adoptó el TCP/IP.";
    var_dump($concat);
    var_dump($concat2);
    echo '<br>';
    var_dump($cadena);

    echo '<br>';  

    // Sumar valor entero con valor booleano
    $num1 = 1;
    $num2 = true;
    
    $res = $num1 + (integer)$num1;
    echo "Todo el mundo sabe que $num1 y $num1 son $res";

?>