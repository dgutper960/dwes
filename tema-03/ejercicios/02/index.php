<?php

// nos retorna el número del mes
$mes = date('m');

// creamos un swich para que imprima 
// el nombre del més partiendo del valor $mes
switch ($mes) {
    case 1:
        echo 'Enero';
        break;
    case 2:
        echo 'Febrero';
        break;
    case 3:
        echo 'Marzo';
        break;
    case 4:
        echo 'Abril';
        break;
    case 5:
        echo 'Mayo';
        break;
    case 6:
        echo 'Junio';
        break;
    case 7:
        echo 'Julio';
        break;
    case 8:
        echo 'Agosto';
        break;
    case 9:
        echo 'Septiembre';
        break;
    case 10:
        echo 'Octubre'; // Imprime esto
        break; // <-la ejecución para aquí, en el momento de hacer este ejercicio
    case 11:
        echo 'Noviembre';
        break;
    case 12:
        echo 'Diciembre';
        break;

}




?>