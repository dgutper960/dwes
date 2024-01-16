<?php
/**
 * Creamos la clase cliente
 * - Respetamos estrictamente las columnas en la tabla de la BBDD como atributos de la clase
 * - Nomenclatura camelCase de forma obligatoria
 * - No se respetará el principio de encapsulamiento
 */

 class classCliente{
    public $id;
    public $apellidos;
    public $nombre;
    public $telefono;
    public $ciudad;
    public $dni; // clave secundaria
    public $email; // clave secundaria

    /**
     * Definimos constructor con parámetros opcionales
     */
    public function __construct(
        $id        = null,
        $apellidos = null,
        $nombre    = null,
        $telefono  = null,
        $ciudad    = null,
        $dni       = null,
        $email     = null
    ){
        $this->id        = $id;
        $this->apellidos = $apellidos;
        $this->nombre    = $nombre;
        $this->telefono  = $telefono;
        $this->ciudad    = $ciudad;
        $this->dni       = $dni;
        $this->email     = $email;

    }
 }



?>