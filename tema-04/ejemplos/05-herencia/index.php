<?php

// Importamos la clase Vehiculo
include("class/class.vehiculo.php");
include("class/class.deportivo.php"); // GERARQUÍA DE CLASES (deportivo es hjo de vehículo)

// Instaciamos objeto con parametros
$coche_2 = new Deportivo( //en el mismo orden del constructor
    'El coche de Pepe',
    'Audi A5',
    350,
    'THJ 4528'
);
/** subclase sin consttructor propio */
var_dump($coche_2); // el constructor tambien se hereda
echo'<br>';

/**
 * EN EL CASO DE DECLARAR UN CONSTRUCTOR DE LA SUBCLASE
 * SE SOBREESCRIBE EL CONSTRUCTOR DE LA CLASE PADRE
 */

 echo'<br>';
 $coche_2->velocidadMax(); 
 // debería dar error si el atributo es private (atributos no accesibles para hijos)
 // debería funcionar si los atributos son protected (atributos accesibles para hijos)
 var_dump($coche_2->getVelocidad());




?>