<?php

    ## Función is_null()  

    // variable no definida
    var_dump(is_null($var)); // muesta error pero la ejevución no para

    echo '<br>';

    // variable difinida con valor null saignado
    // -> Si hacemos $var; -> no llega a definir la variable
    $var=null;
    var_dump(is_null($var));

    echo '<br>';




?>