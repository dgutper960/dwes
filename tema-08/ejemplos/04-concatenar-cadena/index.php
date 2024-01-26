<?php


$fichero = "files/Ejemplo.txt";

 $cadena = file_get_contents($fichero);

 // concatenamos el nuevo contenido al contenido anterior
 $cadena .= "\r\nMe encanta PHP!";
 file_put_contents($fichero, $cadena);


