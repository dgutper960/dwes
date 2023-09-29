<?php

    ## Función is_null()  

    // variable no definida
    var_dump(is_null($var)); // true -> muesta error pero la ejevución no para

    echo '<br>';

    // variable difinida con valor null saignado
    // -> Si hacemos $var; -> no llega a definir la variable
    $var=null;
    var_dump(is_null($var)); // true

    echo '<br>';

    # Casos
    $var = 0;
    var_dump(is_null($var)); // false

    echo '<br>';

    $var = "";
    var_dump(is_null($var)); // false

    echo '<br>';

    $var = [];
    var_dump(is_null($var)); // false -> Ya tiene asignado un array (no es la nada)

    echo '<br>';

    ## Función Isset()

    # La variable debe estar declara y su valor no es Null
    // -> A diferencia de is_null()
    # Isset no genera un aviso cuando una variable no es declarada
    $var; // -> En este caso, PHP se comporta como si la variable no estubiera declarada

    # Casos:

    $var; 
    var_dump(isset($var)); // false

    echo '<br>';

    $var=0; 
    var_dump(isset($var)); // true

    echo '<br>';

    $var=[]; 
    var_dump(isset($var)); // true

    echo '<br>';

    $var = ""; 
    var_dump(isset($var)); // true

    echo '<br>';

    ## is_empty()
    // Determina si una variable está vacía
    // Con variables no definidas da true pero genera aviso
    // Cadenas con un cero da true

    










?>