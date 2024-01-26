<?php

/**
 * Ejemplo 1 
 * 
 * Creamos un archivo en texto plano
 */


 # Crreamos un archivo para escritura
 # Si no existe, lo crea

$fichero = "Ejemplo.txt";
$fp = fopen($fichero, 'wb');


# Escritura
fwrite($fp, 'Mi primer Hola Mundo en un fichero');


# Cierre
fclose($fp);

echo "<h1>Fichero creado con éxito</h1>";
 