<?php

// Importamos la clase Vehiculo
include("class/class.vehiculo.php");

// Instanciamos un vehiculo
$coche_1 = new Vehiculo();

// vemos el objeto
var_dump($coche_1);

echo '<br>';
// asignamos valores
$coche_1->setNombre("Er cohe del Paco");
$coche_1->setModelo('Cupra_R3');
$coche_1->setMatricula('MA-356483');
$coche_1->setVelocidad(250);

var_dump($coche_1->getNombre());
echo '<br>';
var_dump($coche_1->getModelo());
echo '<br>';
var_dump($coche_1->getMatricula());
echo '<br>';

var_dump($coche_1);
echo '<br>';

// llamamos al método aumentaVel()
$coche_1->aumentaVel();

var_dump($coche_1->getVelocidad()); // 260

echo '<br>';    

?>