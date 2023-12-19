<?php

class classAlumno
{

    public $id = null;

    public $nombre = null;
    public $apellidos = null;
    public $email = null;
    public $telefono = null;
    public $direccion = null;

    public $poblacion = null;

    public $provincia = null;

    public $nacinalidad = null;

    public $dni = null;

    public $fechaNac = null;

    public $id_curso = null;

    public function __construct(
        $id,
        $nombre,
        $apellidos,
        $email,
        $telefono,
        $direccion,
        $poblacion,
        $provincia,
        $nacinalidad,
        $dni,
        $fechaNac,
        $id_curso)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->poblacion = $poblacion;
        $this->provincia = $provincia;
        $this->nacinalidad = $nacinalidad;
        $this->dni = $dni;
        $this->fechaNac = $fechaNac;
        $this->id_curso = $id_curso;

    }

}


?>