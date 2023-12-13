<?php

/*
     create.php

     Controlador que permite añadir un nuevo libro a la tabla libros de geslibros

*/
include("config/config.php");

# Cargamos las clases necesarias en orden
# Cargamos las clases necesarias en orden
include("class/class.conexion.php");
include("class/class.libro.php"); // necesitamos insatnciar libro
include("class/class.libros.php");


# Cargamos el modelo
include("models/model.create.php");

# Cargamos la vista
header("location: index.php");
?>