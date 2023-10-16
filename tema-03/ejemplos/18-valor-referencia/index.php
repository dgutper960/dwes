<?php

# vamos a tomar valores por argumento y por referencia
function sumar($var1, $var2, &$resultado){ // es la direccion de memoria (se refleja fuera de la función) 

    $resultado = $var1 + $var2; // se modifica por referencia

}


$r = 0;

$num1 = 15;
$num2 =30;

sumar($num1, $num2, $r); // por referencia se modifican $resultado y $r

echo "Resultado $num1 + $num2 = ".$r;


?>