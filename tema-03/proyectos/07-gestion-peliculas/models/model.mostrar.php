<?php

/*

    Modelo: model.mostrar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea mostrar

*/
# Cargamos los datos de las peliculas
$paises = getPaises();
$generos = getGeneros();
$peliculas = getPeliculas();

   // obtenemos el id a través del método GET
   $id = $_GET['id'];

   // cargamos el array de ese artículo
   $indice = buscar($peliculas,'id',$id);
   if ($indice !==false){
       // cargamos los datos de la pelicula en el array
       $pelicula = $peliculas[$indice];
   } else{
       echo 'ERROR: Libro no encontrado';
       exit();
   }






?>