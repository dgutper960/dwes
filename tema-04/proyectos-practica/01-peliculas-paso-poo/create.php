<?php

// debemos cargar las clases en el orden adecuado
include("class/class.pelicula.php");
include("class/class.arrayPeliculas.php");

// cargamos el modelo
include("models/model.create.php");

// cargamos la vista
include("views/view.index.php");

?>