<?php

$a = 5;
$b = 6;

// en el modelo se aconseja

if ($a > $b) {
    echo $a;
} else {
    echo $b;
}

// en la vista se aconseja

$mayor = ($a > $b) ? $a : $b;

echo ($a > $b) ? $a : $b; // equivalente a la anterior

?>