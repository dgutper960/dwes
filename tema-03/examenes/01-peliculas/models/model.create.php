<?php

    /*

        model.create.PHP

        - Añade un elemento a la tabla 

    */
    # cargamos los datos
    $peliculas = generar_tabla();
    $paises = getPaises();
    $generos = getGeneros();

    #id debe ser generado de forma dinamica
    $id = array_key_last($peliculas)+1;

    # Capturamos los datos del formulario
    $titulo = $_POS["titulo"];
    $pais = $_POST["pais"];
    $director = $_POST["director"];
    $year = $_POST["año"];
    $generos = $_POST['generos']; // obtenemos un array del checkbox
    
   # Creamos un array auxiliar con los dartos capturados
   $pelicula = [

    'id' => $id,
    'titulo'=> $titulo,
    'pais'=> $pais,
    'director' => $director,
    'year' => $year,
    'generos' => $generos

   ];

   # Añadimos el nuevo array a la matriz
   $peliculas [] = $peliculas;



?>