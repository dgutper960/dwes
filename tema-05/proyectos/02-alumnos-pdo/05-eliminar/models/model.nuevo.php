<?php

    /*

        Modelo nuevo.php

    */

    # creamos objeto de la clase conexion (Alumnos hereda de conexión)
    // conexion con la BBDD
    $conexion = new Alumnos();

    # extraigo los valores de los alumnos
    // objeto de la clase pdo stmt
    $cursos = $conexion->getCursos();
    

?>