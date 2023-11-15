<?php
    /*
        Modelo: model.index.php
        Descripcion: genera un array de objetos de alumnos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos

    # creamos objeto de a clase fp
    $db = new Fp(); // hereda de conexion -> ejecuta el constructor que conecta con la base de datos

    $alumnos = $db->getAlumnos();

    



?>