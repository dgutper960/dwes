<?php

class Deportivo extends Vehiculo
{

    /**
     * Ya tenemos de por sí todos los 
     * atributos y métodos de Vehículo
     * --> En la importación hay que guardar la gerarquía
     */
    // clases propias de Deportivo
    private $cilindrada;
    private $km;

    /**
     * Si queremos estos atributos en el constructor
     * hay que hacerlo de la sig manera
     */

    public function __construct(
        // atributos de la clase padre
        $nombre = null,
        $modelo = null,
        $velocidad = null,
        $matricula = null,
        // parametros de la subclase
        $cilindrada = null,
        $km = null,
    ) {
        // parametros del constructor clase padre
        parent::__construct($nombre, $modelo, $velocidad, $matricula);
        // parametros de la subclase
        $this->cilindrada = $cilindrada;
        $this->km = $km;
    } // la instancia de Deportivo solo ejecuta este constructor


    

	/**
	 * Ya tenemos de por sí todos los
	 * atributos y métodos de Vehículo
	 * --> En la importación hay que guardar la gerarquía
	 * @return mixed
	 */
	public function getCilindrada() {
		return $this->cilindrada;
	}
	/**
	 * Ya tenemos de por sí todos los
	 * atributos y métodos de Vehículo
	 * --> En la importación hay que guardar la gerarquía
	 * @param mixed $cilindrada Ya tenemos de por sí todos los
	 * @return self
	 */
	public function setCilindrada($cilindrada): self {
		$this->cilindrada = $cilindrada;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getKm() {
		return $this->km;
	}
	
	/**
	 * @param mixed $km 
	 * @return self
	 */
	public function setKm($km): self {
		$this->km = $km;
		return $this;
	}

/***
 * INTENTAMOS USAR UN ATRIBUTO DE LA CLASE PADE
 */
public function velocidadMax(){
	$this->velocidad = 500; // en la implementacion no da error
} // al llamar a este método vamos a tener error
// El atributo velocidad de padre tiene visibilidad privada
// Solo accestible mediante getter y setter


}
?>