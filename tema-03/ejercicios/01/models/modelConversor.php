<?php

    // tomamos la variable del valor
    $valor = $_POST['valor'];

    // CREAMOS LA VARIABLES PARA MOSTRAR EN EL RESULTADO
    $nameBinario = 'BINARIO';
    $nameOctal = 'OCTAL';
    $nameHexad = 'HEXADECIMAL';



    // pasamos el valor a binario
    $binario = decbin($valor);

    // pasamos el valor a octal
    $octal = decoct($valor);

    // pasamos el valor a hexadecimal
    $hexadecimal = dechex($valor);



?>