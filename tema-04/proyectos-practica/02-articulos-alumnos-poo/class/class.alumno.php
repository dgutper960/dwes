<?php

/**
 * Clase Alumno
 */
class Alumno
{
    // atributos visibilidad publica
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $fecha_nac; // edad calculada
    public $curso; // un solo curso
    public $asignaturas; // será un array

    // constructor
	/**
	 * No reaquerido, lo mantenemos por cumplir la convención
	 */
    public function __construct(
        $id = null,
        $nombre = null,
        $apellidos = null,
        $email = null,
        $fecha_nac = null, 
        $curso = null,
        $asignaturas = [] // sabemos que debe ser un array
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->fecha_nac = $fecha_nac;
        $this->curso = $curso;
        $this->asignaturas = $asignaturas;
    }
    

    /**
	 * GETTERS Y SETTERS NO NECESARIOS -> visibilidad pública de los atributos
	 */
	/**
	 * Metodo para calcular edad
	 */
	public function getEdad(){

        // usamos el método estático de DateTime y le damos formato
        $fecha_nac = DateTime::createFromFormat('d/m/Y', $this->fecha_nac);
        // creamos un objeto con la fecha actual
        $fecha_actual = new DateTime();
		// calculamos la diferencia entre fechas y lo retornamos en años
        $edad = $fecha_actual->diff($fecha_nac)->y;

        return $edad;
        
    }

}


?>