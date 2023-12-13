<?php

   /*  
        model.ordenar.php

    */

    // Capturamos el numero de la columna
    $columna = $_GET['columna'];
    # Cargamos los datos necesarios
    // conexion
    $conexion = new Libros();

// accedemos al método getLibros()
  $libros = $conexion->order($columna);

?>