<?php
/*
        Modelo: model.editar.php
        Descripción: edita un elemento de la tabla.

        Método GET:
            - id del libro que quiero editar
    */

# Cargamos la tabla
$libros = generar_tabla();

# Tomamos el id del libro que vamos a editar
$id = $_GET['id'];

# Buscamos en tabla
$indice_editar = buscar_en_tabla($libros, 'id,', $id);

if ($indice_editar !== false) {
    // obtengo el array del libro que quiero editar
    $libro = $libros[$indice_editar];
}else{
    echo 'ERROR. Libro no encontrado';
    exit();
}

?>