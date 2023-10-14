<?php

/* Crear un formulario que muestre una entrada para cada uno de los días de la semana que llevamos hasta ahora, 
es decir, si es lunes mostrará sólo una entrada con la etiqueta lunes, 
si es martes mostrará dos entradas, una para el lunes y otra para el martes, 
en tal caso si fuese domingo mostraría 7 entradas una para cada día de la semana. 
Usar bucle for */

// obtenemos el día de la semana con date()
$date = date("w"); // retorna un numérico correspondiente al día de la semana
if ($date == 0) {
    $date = 7;
}
$dia; // en esta variable vamos a almacenar el nombre del día
for ($i = 0; $i >= $date; $i++) {
    switch ($i) {
        case 1:
            $dia = 'Lunes';
            break;
        case 2:
            $dia = 'Martes';
            break;
        case 3:
            $dia = 'Miercoles';
            break;
        case 4:
            $dia = 'Jueves';
            break;
        case 5:
            $dia = 'Viernes';
            break;
        case 6:
            $dia = 'Sábado';
            break;
        case 7:
            $dia = 'Domingo';
            break;
    }
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">'.$dia.'</label>';
    echo '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
    echo '<div id="emailHelp" class="form-text">Introduzca entrada para el '.$dia.'</div>';
    echo '</div>';
    echo '<br>';
}

?>