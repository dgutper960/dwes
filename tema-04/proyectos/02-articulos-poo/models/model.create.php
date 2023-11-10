<?php
/*
    Modelo: model.create.php
    Descripción: Cargaremos los datos del formulario nuevo y los introducimos al array original de artículos

    Método POST 
        - descripcion
        - modelo
        - categorias (valor númerico)
        - unidades
        - precio
    
    El id será generado de forma automatica por la función ultimoId()
*/


// Carga de datos
setlocale(LC_MONETARY, "es_ES"); // Indicamos

# Cargamos los datos a partir de los métodos estáticos de la clase
$categorias = ArrayArticulos::getCategorias(); // getCategorias -> Método estático
$marcas = ArrayArticulos::getMarcas(); // getMarcas -> Método estático

# Creamos un objeto de la clase ArrayArticulos
$articulos = new ArrayArticulos();

# Creamos un objeto de articulo
$articulo = new Articulo();

# Cargo los datos
$articulos->getDatos();

// Recogemos los datos del formulario
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marcas'];
$categoriasArt = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

# Creamos un objeto de articulo y añadimos los valores
$articulo = new Articulo(
    $id,
    $descripcion,
    $modelo,
    $marca,
    $categoriasArt,
    $unidades,
    $precio
);

// Añadimos el artículo usando la funcion create de ArrayArticulos
$articulos->create($articulo);

# Generamos una notificación
$notificacion = 'Articulo añadido con éxito';

?>