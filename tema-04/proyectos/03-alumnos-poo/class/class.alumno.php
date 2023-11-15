<?php

/**
 * Clase Articulo
 */
class Alumno
{
    // atributos
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $fecha_nacimiento;
    public $curso;
    public $asignaturas;

    // constructor
	/***
	 * No es necesario pero lo ponemos para mantener la convencion
	 */
    public function __construct(

        $id = null,
        $nombre = null,
        $apellidos = null,
        $email = null,
        $fecha_nacimiento = null, // sabemos que debe ser un array
        $curso = null,
        $asignaturas = []

    ) {
        $this->$id = $id;
        $this->$nombre = $nombre;
        $this->$apellidos = $apellidos;
        $this->$email = $email;
        $this->$fecha_nacimiento = $fecha_nacimiento;
        $this->$curso = $curso;
        $this->$asignaturas = $asignaturas;
    }

    /**
     * Metodo para extraer la edad
     */
    public function getEdad(){

        // creamos un objeto con la fecha de nacimiento
        $fecha_nac = new DateTime($this->fecha_nacimiento);

        // creamos un objeto con la fecha actual
        $fecha_actual = new DateTime();

        $edad = $fecha_actual->diff($fecha_nac)->y;

        return $edad;
        
    }
    

}


?>