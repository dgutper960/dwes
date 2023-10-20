<?php

/* Modelo: model.create
   Descripcion: Crea un nuevo libro en la tabla
   
   Metodo POST:
        - id
        - titulo
        - autor
        - genero
        - precio
   
*/

// este formulario no se va a validar
// lo podemos hacer sin este paso
// PERO LOS FORMULARIOS HAY QUE VALIDARLOS
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

# CREO UN ARRAY ASOCIADO CON LOS DETALLES DEL LIBRO
$libro =[
    'id' => $id,
    'titulo' => $titulo,
    'autor' => $autor,
    'genero' => $genero,
    'precio'=> $precio
];
// revisamos en el index que los indices coinciden

# Añadimos el libro a la tabla
array_push($libros, $libro);

# //ALTERNATIVA MÁS FRECUNTE
// $libros[] = $libro


?>