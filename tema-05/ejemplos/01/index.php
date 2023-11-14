<?php

/**
 * Creamos una conexion al localhost 
 * -> 127.0.0.1:3306
 * -> ususario root
 * -> base de datos fp
 * 
 */

 $servidor = 'localhost'; /** en su defecto podemos poner la ip del servidor */
 $user = 'root';
 $pass = '';
 $bbdd = 'fp';

 # Para establecer la conexión
 $conexion = mysqli_connect($servidor, $user,$pass,$bbdd);

 /**
  * Controlamos los errores de la conexion
  */

  if(mysqli_connect_errno()) {
    echo 'Nº Error'. mysqli_connect_errno();
    echo '<br>';
    echo 'Error en la conexión'. mysqli_connect_error();
    exit();
  }

  echo 'conexion establecida con exito';



?>