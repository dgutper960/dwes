<?php

/**
 * Clase Corredor
 *  - No se atienden los principios de encapsulamiento
 *  - Definiremos un constructor con los parametros opcionales
 *  - Los atributos deben corresponder de forma extricta con los de la tabla corredores en la BBDD
 */

 Class Corredor{
    // atributos
    public $id;
    public $nombre;
    public $apellidos;
    public $ciudad;
    public $fechaNacimiento;
    public $sexo;
    public $email;
    public $dni;

    public $edad;

    public $id_categoria;
    public $id_club;

    public function __construct(
        $id = null,
        $nombre = null,
        $apellidos = null,
        $ciudad = null,
        $fechaNacimiento = null,
        $sexo = null,
        $email = null,
        $dni = null,
        $edad = null,
        $id_categoria = null,
        $id_club = null,
    ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->ciudad = $ciudad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->dni = $dni;
        $this->edad = $edad;
        $this->id_categoria = $id_categoria;
        $this->id_club = $id_club;
    }
    

 }



?>