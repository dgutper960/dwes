<?php

/* Crear un script PHP que permita mostrar los números del 1 al 100 
en una tabla a 10 filas y 10 columnas. Usar bucle while. */

// insertaremos el código dentro de la table bootstrap

$i = 0;
// con este bucle generamos las filas
while ($i < 10) {
    echo '<tr>';
    $j = 0; // j debe reiniciar antes de entrar al segundo cilclo
    // con este bucle generamos las columnas
    while ($j < 10) {
        // calculamos el número a mostrar en la casilla
        $numero = ($i * 10) + $j + 1; // la primera iteración i-j valen 0 (sumamos 1)
        // por cada vuelta mostramos una columna
        echo "<td>" . $numero . "</td>";
        $j++;
    }
    echo "</tr>";
    $i++; // el incremento de i debe hacerse una vez finalizado cada ciclo completo
}


?>