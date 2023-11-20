<?php
/**
 * Creamos la clase Pelicula
 * -> Haremos este ejercicio cumpliendo la encapsulación
 */
class Pelicula
{

    // atributos
    private $id;
    private $titulo;
    private $director;
    private $generos; // será un array de géneros
    private $pais; // toma el valor de un array de paises
    private $year;

    // constructor
    // parametros opcionales
    public function __construct(
        $id = null,
        $titulo = null,
        $director = null,
        $generos = [], // tomará los valores de un array 
        $pais = null, // el valor corresponde con los indices de un array pero es único 
        $year = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->director = $director;
        $this->generos = $generos;
        $this->pais = $pais;
        $this->year = $year;
    }

    /**
     * Cumplimos el prncipio de encapsulamiento
     * debemos generar getters y setters
     */





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
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of director
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set the value of director
     */
    public function setDirector($director): self
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get the value of generos
     */
    public function getGeneros()
    {
        return $this->generos;
    }

    /**
     * Set the value of generos
     */
    public function setGeneros($generos): self
    {
        $this->generos = $generos;

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
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     */
    public function setYear($year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Ya tenemos nuestra clase Pelicula preparada
     */



}

?>