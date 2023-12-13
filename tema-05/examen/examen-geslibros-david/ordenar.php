<?php

    /*
        ordenar.php

        Permite mostrar los libros ordenados por criterio ASC a partir de las siguientes columnas:
        - id
        - titulo
        - autor
        - editorial
        - unidades
        - coste
        - pvp

    */

        # Cargamos la configuracion
        include("config/config.php");

        # Cargamos las clases necesarias en orden
        include("class/class.conexion.php");
        include("class/class.libros.php");
        // no instanciamos libros
    
        # Cargamos el modelo
        include("models/model.ordenar.php");
    
        # Cargamos la vista
        include("views/view.index.php");

?>