<?php

/* Crear un script PHP que permita mostrar los números del 1 al 100 
en una tabla a 10 filas y 10 columnas. Usar bucle while. */

// insertaremos este código dentro de la table bootstrap

$i = 0;
// con este bucle generamos las filas
while ($i < 10) {
    echo '<tr>';
    $j = 0;
    // con este bucle generamos las columnas
    while ($j < 10) {
        // calculamos el número a mostrar en la casilla
        $numero = ($i * 10) + $j + 1; // En la primera iteración i-j valen 0 (sumamos 1)
        echo "<td>" . $numero . "</td>";
        $j++;
    }
    echo "</tr>";
    $i++; 
}

/**
 * VARIABLE INICIALIZADA A 1
 * MIENTRAS < 100
 * INICIALIZAR VARIALBLE J (Culomna) inicializada a 1
 * resto entre 10 = 0 salta de columna
 */

 /**
  * Se imprime de a 100 con i
  * Se usa j para marcar el cambio de fila (reiniciar a 1)

  */


?>