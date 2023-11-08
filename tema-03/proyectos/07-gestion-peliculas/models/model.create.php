<?php

    /*

        model.create.PHP

        - Añade un elemento a la tabla 

    */

        # Cargamos las tablas
        $paises = getPaises();
        $generos = getGeneros();
        $peliculas = getPeliculas();

        # id nueva pelicula autogenerado
        $id = nuevoId($peliculas);

        # Tomamos los valores de la nueva pelicula
        $titulo = $_POST['titulo'];
        $pais = $_POST['pais'];
        $director = $_POST['director'];
        $year = $_POST['año'];
        $generos_ = $_POST['generos'];

        # Almacenamos los valores en un array
        $pelicula = [

            'id' => $id,
            'titulo'=> $titulo,
            'pais'=> $pais,
            'director'=> $director,
            'año'=> $year,
            'generos'=> $generos_

        ];

        # Cargamos el nuevo array en la tabla
        $peliculas[] = $pelicula; 
   

?>