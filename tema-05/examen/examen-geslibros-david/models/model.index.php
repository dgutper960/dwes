<?php

    /*  
        model.index.php

        Mostrar contenido de la tabla fp.alumnos

        Mostrará la tabla como array de objetos
    */
    # Cargamos los datos necesarios
    // conexion
    $conexion = new Libros();

    // accedemos al método getLibros()
    $libros = $conexion->getLibros();
    



?>