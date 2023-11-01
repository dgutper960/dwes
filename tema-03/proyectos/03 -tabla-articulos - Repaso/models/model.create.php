<?php

# cargamos los articulos
$articulos = generar_tabla();

# Cargamos las categorías
$categorias = generar_categorias();

# Cargamos las marcas
$marcas = generar_marcas();

# Capturamos los valores de los imput en variables
$id_articulo = generar_id($articulos);

$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categorias = $_POST['categorias']; // recibimos array con las categorías
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

# creamos el array con los valores
$articulo = [
    'id' => $id_articulo,
    'modelo'=> $modelo,
    'marca' => $marca,
    'categorias' => $categorias,
    'unidades' => $unidades,
    'precio'=> $precio
];

# Cargamos el nuevo array en la tabla
// array_push($articulos, $articulo);
$raticulos [] = $articulo;



?>