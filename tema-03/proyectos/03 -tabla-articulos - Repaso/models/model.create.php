<?php

# cargamos los articulos
$articulos = generar_tabla();

# Cargamos las categorías
$categorias = generar_categorias();

# Cargamos las marcas
$marcas = generar_marcas();

# Capturamos los valores de los imput en variables
// id autogenerado
// llamada a funcion del id

$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categorias = $_POST['categorias']; // recibimos array con las categorías


?>