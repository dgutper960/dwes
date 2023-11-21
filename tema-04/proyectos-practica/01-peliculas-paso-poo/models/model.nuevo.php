<?php

    /*
        fichero: model.nuevo.php
        Descripción: modelo del proceso nuevo.php. 

    */
        // cargamos los paises
        $paises = ArrayPeliculas::getPaises();
        // cargamos los generos
        $generos = ArrayPeliculas::getGeneros();
    
        // cargamos los datos (debemos instanciar)
        $peliculas = new ArrayPeliculas();
        $peliculas->getDatos(); // llamamos al metodo que carga el array de peliculas

   

    
?>