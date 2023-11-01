<?php
/*
        Modelo: model.create.php
        Descripción: añadir un elemento de la tabla. 

        Método POST:
            - datos del nuevo libro
    */

# Cargamos la tabla
$libros = generar_tabla();

# Capturamos los datos del nuevo libro mediante formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

# Creamos un nuevo array con los datos
$libro = [

    'id'=> $id,
    'titulo'=> $titulo,
    'autor'=> $autor,
    'genero'=> $genero,
    'precio'=> $precio,

];

# Añadimos el nuevo array a la matriz
$libros [] = $libro;

?>