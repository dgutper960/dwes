<?php

// Importamos la clase Vehiculo
include("class/class.vehiculo.php");

// Instaciamos objeto con parametros
$coche_2 = new Vehiculo( //en el mismo orden del constructor
    'El coche de Pepe',
    'Audi A5',
    350,
    'THJ 4528'
);

var_dump($coche_2);
echo'<br>';

/**
 * Destruimos el coche_2
 */
unset($coche_2); // Se ejecuta el codigo del cuerpo del destructor

// // Instanciamos un vehiculo
// $coche_1 = new Vehiculo();

// // vemos el objeto
// var_dump($coche_1);

// echo '<br>';
// // asignamos valores
// $coche_1->setNombre("Er cohe der Paco");
// $coche_1->setModelo('Cupra_R3');
// $coche_1->setMatricula('MA-356483');
// $coche_1->setVelocidad(250);

// var_dump($coche_1->getNombre());
// echo '<br>';
// var_dump($coche_1->getModelo());
// echo '<br>';
// var_dump($coche_1->getMatricula());
// echo '<br>';

// var_dump($coche_1);
// echo '<br>';

// // llamamos al método aumentaVel()
// $coche_1->aumentaVel();

// var_dump($coche_1->getVelocidad()); // 260

// echo '<br>';    

?>