<?php

/*
    Modelo: model.update.php
    Descripción: Actualiza los datos de un articulo
    Método POST: -  id
                    descripcion
                    modelo
                    categoria
                    unidades
                    precio


    Método GET: - id
*/

// Cargargamos la tabla
$articulos = generar_tabla();
$categorias = generar_categoria();

//Extraremos los datos del formulario
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

//Obtener el índice del artículo que quiero editar
$id_articulo = $_GET['id'];

//Obtener los datos del artículo
$indice_articulo_editar = buscar_en_tabla($articulos, 'id', $id_articulo);

//Creo un array asociativo con los detalles del artículo modificado

$articulo =[
    'id' => $id_articulo,
    'descripcion' => $descripcion,
    'modelo'=> $modelo,
    'categorias'=> $categorias,
    'unidades'=> $unidades,
    'precio'=> $precio
    ];

//Añado el articulo  modificado a la tabla
$articulos[$indice_articulo_editar] = $articulo;