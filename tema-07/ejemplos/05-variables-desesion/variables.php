<?php

/**
 * ejemplo 7.5
 * Variables de sesion
 */

# Para inicializar variables de sesión debemos tener una sesion previa


 # Inicio Sesión
 session_start();


 # Creamo variable de sesion llamada nombre
 $_SESSION['nombre'] = 'David';
 $_SESSION['apellidos'] = 'Gutiérrez Pérez';
 $_SESSION['id'] = 123456;



?>