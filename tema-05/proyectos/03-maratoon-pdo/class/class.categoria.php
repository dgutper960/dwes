<?php
/**
 * Implemantemos la clase categorias
 *  - Debe respetar de forma extricta las columnas de la tabla en la BBD
 */

 Class Categorias{
    public $id;
    public $nombreCorto;
    public $nombre;
    public $descripcion;

     /**
  * Crearemos el constructor, pero no es necesario
  */
  public function __construct(
    $id = null,
    $nombreCorto = null,
    $nombre = null,
    $descripcion = null,
  ){
    $this->id = $id;
    $this->nombreCorto = $nombreCorto;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;

  }

 }



?>