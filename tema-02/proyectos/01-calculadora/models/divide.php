<?php

/* 

    Modelo: divide.php
    Descripción: divide los valorees del formulario

*/

// Creo las variables y añado los valores por el atributo name de index.html
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];

// Doy nombre a la operación
$operacion = "Dividisión";

// Realiza la operación
$resultado = $valor1 / $valor2;


?>