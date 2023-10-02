<?php

/* 

    Modelo: suma.php
    Descripción: suma los valorees del formulario

*/

// Creo las variables y añado los valores por el atributo name de index.html
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];

$operacion = "Sumar";

$resultado = $valor1 + $valor2;


?>