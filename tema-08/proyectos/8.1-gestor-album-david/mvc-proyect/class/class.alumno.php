<?php

    /*
        Creamos una clase para cada tabla
        las propiedades públicas y una propiedad para cada columna

        No respetará la propiedad de encapsulamiento.
    */

    class classAlbum {

        public $id;
        public $titulo;
        public $descripcion;
        public $autor;
        public $fecha;
        public $lugar;
        public $categoria;
        public $etiquetas;
        public $num_fotos;
        public $num_visitas;
        public $carpeta;
        public $created_at;
        public $update_at;

        public function __construct(
            $id     = null,
            $titulo = null,
            $descripcion= null,
            $autor= null,
            $fecha= null,
            $lugar= null,
            $categoria= null,
            $etiquetas= null,
            $num_fotos= null,
            $num_visitas= null,
            $carpeta= null,
            $created_at= null,
            $update_at = null
        ) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
            $this->autor = $autor;
            $this->fecha = $fecha;
            $this->lugar = $lugar;
            $this->categoria = $categoria;
            $this->etiquetas = $etiquetas;
            $this->num_fotos = $num_fotos;
            $this->num_visitas = $num_visitas;
            $this->carpeta = $carpeta;
            $this->created_at = $created_at;
            $this->update_at = $update_at;

        }

        
    }
