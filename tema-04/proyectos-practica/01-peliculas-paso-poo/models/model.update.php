<?php

/*

    model.update.PHP

    - Edita un elemento a la tabla 

*/
// cargamos los paises
$paises = ArrayPeliculas::getPaises();
// cargamos los generos
$generos = ArrayPeliculas::getGeneros();

// cargamos los datos (debemos instanciar)
$peliculas = new ArrayPeliculas();
$peliculas->getDatos(); // llamamos al metodo que carga el array de peliculas

/**
 * Tomamos el indice por GET
 * -> Este dato es para editar por indice (se machaca el elemento)
 */
$indice = $_GET['indice'];

/**
 * Tomamos los datos de nuevo.php
 */
$id = $_POST["id"];
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
$peliculas->update($indice, $nuevaPelicula);




?>