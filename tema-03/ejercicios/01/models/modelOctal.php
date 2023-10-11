<?php

    // tomamos la variable del valor
    $valor = $_POST['valor'];

    // pasamos el valor a octal
    $conversion = decoct($valor);
    
    // mostramos el nombre en la vista Calculo
    $nombre = 'OCTAL';

?>