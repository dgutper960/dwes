<?php

    // definimos todas las variables
    // gravedad es una constante
    Define("G", 9.8);

    // tomamos los valores del usuario
    $v0 = $_POST['v0'];
    $angulo = $_POST['a0'];
    $a0 = deg2rad($angulo);

    # hacemos los calculos


    // vel inicial x
    $vx = $v0 * cos($a0);

    // vel inicial y
    $vy = $v0 * sin($a0);

    // Alcance Máximo
    $xmax = (pow($v0, 2))*(sin(2*$a0))/(G);

    // Tiempo de vuelo
    $t = (2*$vy)/G;

    // Altura máxima
    $ymax = (pow($v0, 2)*pow(sin($a0), 2))/(2*G);


?>