<?php

# Cargamos la tabla
$articulos = generar_tabla();

# Obtenemos el ID
$indice = $_GET['id'];


# Cargamos buscar_en_tabla
$indice_editar = buscar_en_tabla($articulos, 'id', $indice);
    if ($indice_editar !== false) {
        $articulo = $articulos[$indice_editar];
    }else{
        echo'ERROR!!: Libro no encontrado';
        exit();
    }

# Tomamos los valores del formulario editar
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

# Creamos un array con el modelo editado
$articulo_editado = [

    'id'=> $indice,
    'descripcion' => $descripcion,
    'modelo'=> $modelo,
    'categoria'=> $categoria,
    'unidades'=> $unidades,
    'precio'=> $precio

];

# Machacamos el indice a editar con los nuevos valores
$articulos[$indice_editar] = $articulo_editado;


?>