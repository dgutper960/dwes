<?php

/**
 * Creamos una conexion al localhost 
 * -> 127.0.0.1:3306
 * -> ususario root
 * -> base de datos fp
 * 
 * -> Obtenemos un array asociativo
 * 
 */

 $servidor = 'localhost'; /** en su defecto podemos poner la ip del servidor */
 $user = 'root';
 $pass = '';
 $bbdd = 'fp';

 # Para establecer la conexión usamos un objeto mysqli
 $conexion = new mysqli($servidor, $user, $pass, $bbdd);

 /**
  * Controlamos los errores de la conexion
  */

  if(mysqli_connect_errno()) {
    echo 'Nº Error'.$conexion->connect_errno; /** es una propiedad de la clase (NO PERENTESIS) */
    echo '<br>';
    echo 'Error en la conexión'. $conexion->connect_error;
    exit();
  }

  echo 'conexion establecida con exito';

  /**
   * HACEMOS UNA CONSULTA A LA BBDD
   */

   # creo una variable con el comando SQL 

  $sql = 'select * from alumnos order by id';

  # guardamos el resultado usando el método query de la clase mysqli
  $result = $conexion->query($sql); /** esto retorna un objeto de la clase mysqli_result (con sus propiedades) */

  # vemos unas de las propiedades de objeto
  echo '<br>';
  echo 'Numero de registros: '.$result->num_rows;
  echo '<br>';
  echo 'Numero de registros: '.$result->field_count;
  echo '<br>';

  # Creamos una variable para almacenar alumnos
  // retorna un array de tipo asuciativo
  $alumnos = $result->fetch_all(MYSQLI_ASSOC); // constante que indica la forma en la que extrae los datos

  print_r($alumnos);


?>