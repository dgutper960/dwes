<?php

/* Modelo: model.update
   Descripcion: Atualiza un libro de la tabla
   
   Metodo POST:
        - id
        - titulo
        - autor
        - genero
        - precio

    Metodo GET:
        -id
   
*/

// este formulario no se va a validar
// lo podemos hacer sin este paso
// PERO LOS FORMULARIOS HAY QUE VALIDARLOS
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];


// revisamos en el index que los indices coinciden

# Editamos un indice del libro
// obtenemos el indice del libro
$id_editar = $_GET['id'];

// obtener el indice
$indice_libro_editar = buscar_en_talabla($libros, 'id', $id_editar);

# CREO UN ARRAY ASOCIADO CON LOS DETALLES DEL LIBRO
$libro =[
    'id' => $id,
    'titulo' => $titulo,
    'autor' => $autor,
    'genero' => $genero,
    'precio'=> $precio
];

# actualizo la tabla de libros 
$libros[$indice_libro_editar] = $libros;



?>