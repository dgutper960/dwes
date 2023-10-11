<?php

# imprime los números pares del 0 al 100


for ($i = 0; $i <= 100; $i += 2) {
    echo '<br>';
    echo $i;
}

# El for se puede desmontar
$i = 0;
for (; ; ) {

    if($i > 100){
        break; // las instrucciones están fuera del if
    }
    echo '<br>';
    echo $i;
    $i += 2;
}


?>