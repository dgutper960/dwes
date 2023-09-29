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

    $var = "";
    var_dump(is_null($var)); // false

    $var = [];
    var_dump(is_null($var)); // false -> Ya tiene asignado un array (no es la nada)

    







?>