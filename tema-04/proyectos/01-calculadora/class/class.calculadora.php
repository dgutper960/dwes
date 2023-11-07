<?php
# Creamos la clase calculadora
class Calculadora
{
	# Atributos privados
	private $valor1;
	private $valor2;
	private $operacion;
	private $resultado;

	# Constructor con valores a cero
	public function __construct(
		/** Requerimiento inicializar valores */
		$valor1 = 0,
		$valor2 = 0,
		$operacion = null,
		$resultado = 0

	)
	{

		$this->valor1 = $valor1;
		$this->valor2 = $valor2;
		$this->operacion = $operacion;
		$this->resultado = $resultado;
	}

	# Atributos privados requieren de getters y setters para ser vistos y manipulados
	// Los generamos con la extensión recomendada
	/**
	 * @return mixed
	 */
	public function getValor1()
	{
		return $this->valor1;
	}

	/**
	 * @param mixed $valor1 
	 * @return self
	 */
	public function setValor1($valor1): self
	{
		$this->valor1 = $valor1;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValor2()
	{
		return $this->valor2;
	}

	/**
	 * @param mixed $valor2 
	 * @return self
	 */
	public function setValor2($valor2): self
	{
		$this->valor2 = $valor2;
		return $this;
	}

	/**
	 * Get the value of operacion
	 */
	public function getOperacion()
	{
		return $this->operacion;
	}

	/**
	 * Set the value of operacion
	 */
	public function setOperacion($operacion): self
	{
		$this->operacion = $operacion;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getResultado()
	{
		return $this->resultado;
	}

	/**
	 * @param mixed $resultado 
	 * @return self
	 */
	public function setResultado($resultado): self
	{
		$this->resultado = $resultado;
		return $this;
	}

	# Creamos las funciones para calcular los valores
	// funciones publicas, accesibles desde fuera de la clase
	public function suma()
	{
		$this->operacion = 'suma';
		$this->resultado = $this->valor1 + $this->valor2;
	}

	public function resta()
	{
		$this->operacion = 'resta';
		$this->resultado = $this->valor1 - $this->valor2;
	}

	public function multiplicacion()
	{
		$this->operacion = 'multiplicacion';
		$this->resultado = $this->valor1 * $this->valor2;
	}

	public function division()
	{
		$this->operacion = 'division';
		$this->resultado = $this->valor1 / $this->valor2;
	}

	public function potencia()
	{
		$this->operacion = 'potencia';
		$this->resultado = pow($this->valor1, $this->valor2);
	}



}
# Vemos un ejemplo de uso para estas funciones
# Instanciamos la clase
// $nombreInstancia = new Calculadora();
# Damos valor a las variables con set
// $nombreInstancia->setValor1(5);
// $nombreInstancia->setValor2(2);
# Llamamos al método deseado
// $nombreInstancia->suma();
# Imprimimos el resultado
// echo $nombreInstancia->getResultado();  // 7

?>