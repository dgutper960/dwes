<?php

/*
    Clase Jugador
*/

class Jugador
{

    // Atributos
    private $id;
    private $nombre;
    private $numero;
    private $pais; // indice array de paises

    private $equipo; // indice  array de equipos

    private $posiciones; // este campo de un array de indices -> posiciones

    private $contrato;

    // constructor con parametros opcionales
    public function __construct(

        $id = null,
        $nombre = null,
        $numero = null,
        $pais = null,
        $equipo = null,
        $posiciones = [],
        $contrato = null
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->pais = $pais;
        $this->equipo = $equipo;
        $this->posiciones = $posiciones;
        $this->contrato = $contrato;
    }

    



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero($numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     */
    public function setPais($pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of equipo
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set the value of equipo
     */
    public function setEquipo($equipo): self
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get the value of posiciones
     */
    public function getPosiciones()
    {
        return $this->posiciones;
    }

    /**
     * Set the value of posiciones
     */
    public function setPosiciones($posiciones): self
    {
        $this->posiciones = $posiciones;

        return $this;
    }

    /**
     * Get the value of contrato
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set the value of contrato
     */
    public function setContrato($contrato): self
    {
        $this->contrato = $contrato;

        return $this;
    }
}

?>