<?php

/**
 * Modelo: modle.calcular.php
 * Permite: sumar valores
 */

# Cargamos los valores del formulario
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];
$operacion = $_POST['operacion'];

# Creamos un objeto de calculadora
$calcular = new Calculadora($valor1, $valor2, $operacion, null);
# Llamamos al metodo según el valor de $operación
switch ($operacion) {
    case 'sumar':
        $calcular->suma();
        break;
    case 'restar':
        $calcular->resta();
        break;
    case 'multiplicar':
        $calcular->multiplicacion();
        break;
    case 'dividir':
        $calcular->division();
        break;
    case 'potencia':
        $calcular->potencia();
        break;
}


?>