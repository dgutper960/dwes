<?php
/*
* Debemos crear una clase Alumno
-> No se atenderá al principio de encapsulamiento
*/
class Alumno{
    // Atributos de la clase
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $curso;  // valor igual al indice de un array de cursos
    public $asignaturas; // valores correspondientes a los indices de un array de asignaturas

    // constructor con valores opcionales
    public function __construct(
        $id = null,
        $nombre = null,
        $apellidos = null,
        $email = null,
        $telefono = null,
        $curso = null,
        $asignaturas = [] // campo perteneciente a un array vacío
    ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->curso = $curso;
        $this->asignaturas = $asignaturas;

    }

    /**
     * En este caso no se requieren getters y setters
     */

}


?>