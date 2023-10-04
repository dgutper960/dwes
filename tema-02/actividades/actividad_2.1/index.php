<?php

    // Crear un script PHP que cumpla con los siguientes requisitos:

    // Asignar a una variable un valor de cualquier tipo
    // Mostrar el valor de la variable si se convierte a int
    // Mostrar el valor de la variable si se convierte a bool
    // Mostrar el valor de la variable si se convierte a string
    // Mostrar el valor de la variable si se convierte a float

    // Usando las funciones de conversión, ejemplo intval().
    // Usando la función settype()
    // Haciendo la conversión de forma implícita, (int) $var

    $var1 = '4';
    var_dump($var1);

    echo '<br>';
    // Usamos intval()
    $var2 = intval($var1);
    $var3 = boolval($var1);
    $var4 = strval($var1);
    $var5 = floatval($var1);

    // mostramos el valor de las variables
    var_dump($var2);
    var_dump($var3);
    var_dump($var4);
    var_dump($var5);

    echo '<br>';

    // Usamos settype()
    settype($var2, "integer");
    settype($var3, "boolean");
    settype($var4, "string");
    settype($var5, "float");

    // mostramos el valor de las variables
    var_dump($var2);
    var_dump($var3);
    var_dump($var4);
    var_dump($var5);

    echo '<br>';

    // Forma inplícita
    $var2 = (integer) $var1;
    $var3 = (boolean) $var1;
    $var4 = (string) $var1;
    $var5 = (float) $var1;
    
    // mostramos el valor de las variables
    var_dump($var2);
    var_dump($var3);
    var_dump($var4);
    var_dump($var5);


?>
