<?php

/*

    Modelo: model.editar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea editar

*/
// cargamos los paises
$paises = ArrayPeliculas::getPaises();
// cargamos los generos
$generos = ArrayPeliculas::getGeneros();

// cargamos los datos (debemos instanciar)
$peliculas = new ArrayPeliculas();
$peliculas->getDatos(); // llamamos al metodo que carga el array de peliculas

$indice = $_GET['indice'];

/**
 * cargamos la pelicula que queremos editar
 */
$pelicula = $peliculas->read($indice);





?>