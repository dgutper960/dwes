<?php

    // tomamos la variable del valor
    $valor = $_POST['valor'];

    // pasamos el valor a binario
    $conversion= decbin($valor);

    // mostramos el nombre en la vista Calculo
    $nombre = 'BINARIO';

?>