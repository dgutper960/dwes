<?php

/*
Descripcion: 
    - Elimina un elemento de la tabla

Metodo:
    - GET 

Cargamos los datos de 
    - Tabla
    - Categorías
    - Marca
*/
setlocale(LC_MONETARY,"es_ES");
$articulos = generar_tabla();
$categorias = generar_categorias();
$marcas = generar_marcas();

# Capturamos el id del elemento a eliminar
$id = $_GET['id'];

/* 
    En crud_funciones se ha definido:
    eliminar_en_tabla -> que llama a su vez a
    buscar_en_tabla
*/
// igualamos la tabla a la funcion eliminar_en_tabla
$articulos = eliminar_en_tabla($articulos, $id); 


?>