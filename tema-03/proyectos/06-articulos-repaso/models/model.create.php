<?php

# Cargamos los arrays
$marcas = generar_marcas();
$categorias = generar_categorias();  
$articulos = generar_tabla();

# El id es incrementado, mediante función
$id = ultimoId($articulos);

# Igualamos variables a los datos del formulario
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];
$categorias = $_POST['categorias'];


# Creamos un array y lo rellenamos con los datos
$articulo = [

    'id' => $id,
    'descripcion'=> $descripcion,
    'modelo'=> $modelo,
    'marca'=> $marca,
    'unidades'=> $unidades,
    'precio'=> $precio,
    'categorias'=> $categorias

];

# Añadimos el array a la tabla
$articulos [] = $articulo; 

?>