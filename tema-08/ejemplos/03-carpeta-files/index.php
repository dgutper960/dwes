<?php

/**
 * Ejemplo 3
 * 
 * Añadimos unaa nueva línea
 */


 # Creamos un archivo para escritura
 # Si no existe, lo crea

$fichero = "./files/Ejemplo.txt";
$fp = fopen($fichero, 'ab'); // lo abrimos en modo escritura con el puntero al final


# Escritura
fwrite($fp, "\nEsto es Una Nueva línea");


# Cierre
fclose($fp);

echo "<h1>Fichero creado con éxito</h1>";
 