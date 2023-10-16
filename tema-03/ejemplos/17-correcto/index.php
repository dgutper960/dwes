<?php

/** FUNCIONES PHP */

include 'aritmeticas.php';

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