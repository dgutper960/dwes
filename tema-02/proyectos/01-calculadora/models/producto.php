<?php

/* 

    Modelo: producto.php
    Descripción: multiplica los valorees del formulario

*/

// Creo las variables y añado los valores por el atributo name de index.html
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];

// nombre de la operación
$operacion = "Producto";

// realiza la operación
$resultado = $valor1 * $valor2;


?>