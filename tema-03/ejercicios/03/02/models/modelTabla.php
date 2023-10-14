<?php

/* Crear un script PHP que muestre la tabla de multiplicar del 1 al 10, 
en una tabla a 10 filas y a 10 columnas, 
en el encabezado de cada fila y columna ha de aparecer el número correspondiente 
y en cada celda el resultado de la multiplicación de su fila con su columna. Usar bucle for. */

# insertaremos el código dentro de la table bootstrap

// creamos una variable para el resultado
$resultado;
// creamos un bucle anidado, el exterior será para cada tabla
for($i =1; $i<=10; $i++){
    echo "<tr><th>Tabla del $i";
    echo '<tr>';
    for($j=1; $j<=10; $j++){
        $resultado = $i*$j;
        echo "<br>$i x $j = $resultado</br>";
    }
    echo '</tr>';
    echo '</th></tr>';
}


?>