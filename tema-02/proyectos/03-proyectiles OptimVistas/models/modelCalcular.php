<?php

    // definimos todas las variables
    // gravedad es una constante
    define("G", 9.8);

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
    $xmax = pow($v0, 2)*(sin(2*$a0))/G;

    // Tiempo de vuelo
    $t = (2*$vy)/G;

    // Altura máxima
    $ymax = (pow($v0, 2)*pow(sin($a0), 2))/(2*G);

    // Formatear el resultado -> Buscamos PHP number format y seguimos las instrucciones
    $v0 = number_format($v0,2,",",".");
    $angulo = number_format($angulo,0);
    $a0 = number_format($a0,5,",",".");
    $vx = number_format($vx,2,",",".");
    $vy = number_format($vy,2,",",".");
    $xmax = number_format($xmax,2,",",".");
    $t = number_format($t,2,",",".");
    $ymax = number_format($ymax,2,",",".");


?>