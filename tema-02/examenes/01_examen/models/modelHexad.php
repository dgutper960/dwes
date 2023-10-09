<?php

    // tomamos la variable del valor
    $valor = $_POST['valor'];

    // pasamos el valor a hexadecimal
    $conversion = dechex($valor);

    // mostramos el nombre en la vista Calculo
    $nombre = 'HEXADECIMAL';

?>