<?php

/* Archivo: index.ph
Descripción: Controlador ejemplo
Autor: David Gutiérrez
Fecha: 26/09/23 */

$alumno = "David Gutiérrez";
echo "El alumno es ";
echo "<br>";
echo $alumno;

echo "<br>"; //el echo puede imprimir numéricos sin comillas
echo "La edad del alumno es ";
echo 38;

echo "<br>";

// LA DIFERENCIA ENTRE ECHO Y PRINT ES 
// echo puede imprimir varias cadenas separadas por coma
// -> echo permite varios parámetros de entrada, 
//    la sintaxis admite que no pongamos los paréntesis
echo "Mi nombre es ", "David Gutiérrez";

// PRINT NO PERMITE MÁS DE UN ARGUMENTO
// No obstante, se pueden concatenar cadenas
print("El alumno es ".$alumno);
// print también se puede usar sin paréntesis
print "Alumno preferido = ".$alumno;

/** Prin es adecuado para mostrar formatos como por ej valores monetarios */

?>