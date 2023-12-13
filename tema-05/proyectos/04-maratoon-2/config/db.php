<?php

/**
 * Creamos las cosntantes para la conexión con la BBDD
 *  - Conexión MySQL
 *  - Clase de conexión PDO
 */

 # Definicmos las constantes
 define('SERVER', 'localhost');
 define('USER', 'root');
 define('PASS', null); // ojo con este valor que no esté entre comillas
 define('BD', 'maratoon');

 # Definimos el charset y la collection
 define('CHARSET', 'utf8mb4');
 define('COLLECTION', 'utf8mb4_unicode_ci');

# Este fichero deberemos cargarlo en todos los controladores para que la conexión sea efectiva

?>