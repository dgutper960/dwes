<?php
/*
    Modelo: model.eliminar.php
    Descripción: eliminar un elemento de la tabla

    Método GET:
        - id del artículo que quiero eliminar
*/
setlocale(LC_MONETARY, "es_ES"); // Indicamos

# Cargamos los datos a partir de los métodos estáticos de la clase
$categorias = ArrayArticulos::getCategorias(); // getCategorias -> Método estático
$marcas = ArrayArticulos::getMarcas(); // getMarcas -> Método estático

# Creamos un objeto de articulos
$articulos = new ArrayArticulos;

# Cargo los datos
$articulos->getDatos();

// Extraemos el id a través del método get
$id = $_GET['id'];

# Accedemos al método delete de la clase
$articulos->delete($id);

# Generamos una notificación
$notificacion = 'Articulo eliminado con éxito';


?>