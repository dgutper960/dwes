<?php

/**
 * Clase Articulo
 */
class Articulo
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
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->$email = $email;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->curso = $curso;
        $this->asignaturas = $asignaturas;
    }

    

}


?>