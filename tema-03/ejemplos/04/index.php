<?php

// Calificación de una nota de 0 a 10

$a = 7;



if ($a < 5) {
    echo "La nota es insuficiente";
} elseif ($a == 5) {
    echo "La note es un suficiente";
} elseif ($a > 5 && $a < 7) {
    echo "La nota es un bien";
} elseif ($a >= 7 && $a < 9) {
    echo "La nota es notable";
} elseif ($a > 9 && $a <= 10) {
    echo "La nota es sobresaliente";
} else{
    echo 'el valor no es correcto';
}



?>