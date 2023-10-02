<?php

/* 

    Modelo: resta.php
    Descripción: resta los valorees del formulario

*/

// Creo las variables y añado los valores por el atributo name de index.html
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];

// Esta variable la usare en la vista resultado
$operacion = "Restar";

// Almacenamos la resta de los dos valores
$resultado = $valor1 - $valor2;


?>