<?php
/*
        Modelo: model.uptade.php
        Descripción: edita un elemento de la tabla. 

        Método POST:
            - nuevos datos del libro
    */

# Cargamos la tabla
$libros = generar_tabla();




# Capturamos los datos del nuevo libro mediante formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];


# obtengo el id a editar 
$id_editar = $_GET['id'];

# Obtenemos el libro a editar
$indice_editar = buscar_en_tabla($libros, 'id', $id_editar);

# Creamos un nuevo array con los datos
$libro = [

    'id'=> $id,
    'titulo'=> $titulo,
    'autor'=> $autor,
    'genero'=> $genero,
    'precio'=> $precio,

];



# Editamos la tabla en el indice correspondiente
$libros[$indice_editar] = $libro;

?>