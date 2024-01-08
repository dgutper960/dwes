<?php

/**
 * ejemplo 7.4
 * Destruir sesion
 */

 # continuo con la sesion
 session_start();

# detalles de la sesion
 echo "Sesión Iniciada";
 echo "<BR>";
 echo "SID: ".session_id();
 echo "<BR>";
 echo "NAME: ".session_name();

 # elimino la sesión
 session_destroy(); // elimina el SID pero no la cookie
 session_unset(); // elimina todas las variables de sesión

?>