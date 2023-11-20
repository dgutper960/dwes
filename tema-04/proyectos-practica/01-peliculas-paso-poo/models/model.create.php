<?php

/*

    model.create.PHP

    - Añade un elemento a la tabla 

*/
// cargamos los paises
$paises = ArrayPeliculas::getPaises();
// cargamos los generos
$generos = ArrayPeliculas::getGeneros();

// cargamos los datos (debemos instanciar)
$peliculas = new ArrayPeliculas();
$peliculas->getDatos(); // llamamos al metodo que carga el array de peliculas

/**
 * Tomamos los datos de nuevo.php
 */
$id = count($peliculas->getTabla())+1;
$titulo = $_POST['titulo'];
$director = $_POST['director'];
$generosPel = $_POST['generos'];
$pais = $_POST['pais'];
$year = $_POST['year'];

/**
 * Creamos un objeto pelicula y pasamos los valores obtenidos
 */
$nuevaPelicula = new Pelicula(

    $id, $titulo, $director, $generosPel, $pais, $year

);

/**
 * Añadimos la nueva película a la tabla
 */
$peliculas->create($nuevaPelicula);




?>