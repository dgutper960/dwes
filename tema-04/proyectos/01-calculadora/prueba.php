<?php


# Vemos un ejemplo de uso para estas funciones
# Instanciamos la clase
$nombreInstancia = new Calculadora();
# Damos valor a las variables con set
$nombreInstancia->setValor1(5);
$nombreInstancia->setValor2(2);
# Llamamos al método deseado
$nombreInstancia->suma();
# Imprimimos el resultado
echo $nombreInstancia->getResultado();  // 7



?>