<?php

/*
model.create
Descripción: Añade nuevo artículo a la tabla

Metodo: POST
    - id
    - descripción
    - modelo
    - categoria
    - unidades
    - precio

*/

# Creamos la tabla
$articulos = generar_tabla(); // cargamos la matriz de articulos

# Cargamos las categoías
$categorias = generar_categoria();

$marcas = generar_marcas(); 



# Capturamos los datos del formulario
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categorias = $_POST['$categorias']; // recibo un array de categorías con los indices 
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

# Recordamos que id no lo pedimos al usuario
$id = generar_id($articulos);


# Creamos un array con los detalles
$articulo = [

    'id'=> $id,
    'descripcion'=> $descripcion,
    'modelo'=> $modelo,
    'categoria'=> $categoria,
    'unidades'=> $unidades,
    'precio'=> $precio
];

# Cargamos el array en la matriz
//array_push($articulos, $articulo);
$articulos [] = $articulo;

?>