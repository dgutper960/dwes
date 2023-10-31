<?php
/*
Programación Orientada a Objetos
Ejemplo 1.
*/

// creamos la clase vehículo
class Vehiculo{

    private $nombre;
    private $modelo;
    private $velocidad;
    private $matricula;

    /*constructor que asigna null a todas las propiedades excepto velocidad*/
    public function __construct(){
        $this-> nombre = null;
        $this-> modelo = null;
        $this-> velocidad = 0;
        $this-> matricula = null;
    }

    # Setters
    // Modidifa los valores de los atributos
     public function setNombre($nombre){
        $this->nombre = $nombre;
     }

     public function setModelo($modelo){
        $this->modelo = $modelo;
     }

     public function setVelocidad($velocidad){
        $this->velocidad = $velocidad;
     }

     public function setMatricula($matricula){
        $this->matricula = $matricula;
     }



    # Getters
    // Accede a los valores de los atributos
     public function getModelo($modelo){
        return $this->modelo;
     }

     public function getNombre($nombre){
        return $this->nombre;
     }

     public function getVelocidad($velocidad){
        return $this->velocidad;
     }

     public function getMatricula($matricula){
        return $this->matricula;
     }
}

?>