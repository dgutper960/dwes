<?php

/*
Cargamos los datos de 
    - Tabla
    - Categorías
    - Marca
*/
setlocale(LC_MONETARY,"es_ES");
$articulos = generar_tabla();
$categorias = generar_categorias();
$marcas = generar_marcas();



?>