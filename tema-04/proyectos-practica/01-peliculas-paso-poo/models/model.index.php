<?php

    /*
        fichero: model.index.php
        Descripción: modelo del proceso index.php
        -> Debemos cargar los datos necesarios para la vista
    */
    // cargamos los paises
    $paises = ArrayPeliculas::getPaises();
    // cargamos los generos
    $generos = ArrayPeliculas::getGeneros();

    // cargamos los datos (debemos instanciar)
    $peliculas = new ArrayPeliculas();
    $peliculas->getDatos(); // llamamos al metodo que carga el array de peliculas

    
?>