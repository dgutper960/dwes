<?php

/**
 * ejemplo 7.2
 * Sesion Personalizada
 *  -> Debemos hacerlo antes del session_start
 */

 # Personalizamos
 session_id('123456789');
 session_name('fulanito_de_tal');


 # Inicio Sesión
 session_start();
 echo "Sesión Iniciada";
 echo "<BR>";
 echo "SID: ".session_id();
 echo "<BR>";
 echo "NAME: ".session_name();

?>