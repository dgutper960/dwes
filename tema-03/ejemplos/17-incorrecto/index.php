<?php

/** FUNCIONES PHP */

# Definimos las funciones

//sumar
function sumar($var1, $var2){
    return $var1 + $var2;
}

//sumar
function restar($var1, $var2){
    return $var1 - $var2;
}

//sumar
function multiplicar($var1, $var2){
    return $var1 * $var2;
}

//sumar
function dividir($var1, $var2){
    return $var1 / $var2;
}

//sumar
function resto($var1, $var2){
    return $var1 % $var2;
}

# creamos las variables
$n1 = 10;
$n2 = 30;

# llamamos a las funciones
echo 'Suma: '.sumar($n1, $n2);
echo '<br>'; 

echo 'Resta: '.restar($n1, $n2);
echo '<br>'; 

echo 'Multiplicacion: '.multiplicar($n1, $n2);
echo '<br>'; 

echo 'Division: '.dividir($n1, $n2);
echo '<br>'; 

echo 'Resto: '.resto($n1, $n2);
echo '<br>'; 

?>